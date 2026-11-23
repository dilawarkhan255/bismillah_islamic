<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Teacher;
use App\Support\Timezones;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\StreamedResponse;

/** Admin > Timetable: every class, filterable by teacher and day, printable and exportable. */
class ClassScheduleController extends Controller
{
    public function index(Request $request)
    {
        [$classes, $filters] = $this->filtered($request);

        $teachers = Teacher::orderBy('sort_order')->orderBy('name')->get(['id', 'name']);
        $todayCount = ClassSchedule::active()->onDay($this->today())->whereHas('student', fn ($q) => $q->where('status', 'active'))->count();

        return view('admin.pages.classes.index', compact('classes', 'filters', 'teachers', 'todayCount'));
    }

    public function print(Request $request)
    {
        [$classes, $filters] = $this->filtered($request);

        $byTeacher = $classes->groupBy(fn ($c) => $c->teacher?->name ?? 'No teacher assigned')->sortKeys();
        $teacherName = $filters['teacher'] ? Teacher::find($filters['teacher'])?->name : null;

        return view('admin.pages.classes.print', compact('byTeacher', 'filters', 'teacherName'));
    }

    /** CSV that opens straight in Excel. */
    public function export(Request $request): StreamedResponse
    {
        [$classes, $filters] = $this->filtered($request);

        $name = 'timetable-' . now(Timezones::ACADEMY)->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($classes) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // UTF-8 BOM so Excel shows Urdu/Arabic names correctly
            fputcsv($out, ['Student', 'Parent', 'WhatsApp', 'Teacher', 'Course', 'Days (Pakistan)', 'Time (Pakistan)', 'Ends', 'Minutes', 'Student timezone', 'Student days', 'Student time', 'Status', 'Notes']);
            foreach ($classes as $c) {
                fputcsv($out, [
                    $c->student->name, $c->student->parent_name, $c->student->whatsapp,
                    $c->teacher?->name, $c->course ?: $c->student->course,
                    $c->days_label, $c->time_label, $c->end_time_label, $c->duration_minutes,
                    $c->student->timezone_label, $c->local_days_label ?? $c->days_label, $c->local_time_label ?? $c->time_label,
                    ClassSchedule::STATUSES[$c->status] ?? $c->status, $c->notes,
                ]);
            }
            fclose($out);
        }, $name, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function store(Request $request)
    {
        $class = ClassSchedule::create($this->validated($request));

        return $this->backToStudent($class, 'Class added.');
    }

    public function edit(ClassSchedule $class)
    {
        $class->load('student');

        return view('admin.pages.classes.edit', [
            'class'    => $class,
            'teachers' => Teacher::orderBy('sort_order')->orderBy('name')->get(['id', 'name']),
            'days'     => ClassSchedule::DAYS,
        ]);
    }

    public function update(Request $request, ClassSchedule $class)
    {
        $data = $this->validated($request);
        unset($data['student_id']); // a class stays with its student
        $class->update($data);

        return $this->backToStudent($class, 'Class saved.');
    }

    public function destroy(Request $request, ClassSchedule $class)
    {
        $student = $class->student;
        $class->delete();

        return $request->input('return') === 'timetable'
            ? redirect()->route('admin.classes.index')->with('success', 'Class deleted.')
            : redirect()->to(route('admin.students.edit', $student) . '#classes')->with('success', 'Class deleted.');
    }

    /** @return array{0: Collection<int, ClassSchedule>, 1: array} */
    private function filtered(Request $request): array
    {
        $filters = [
            'teacher' => $request->integer('teacher') ?: null,
            'day'     => $request->query('day', 'all'),
            'status'  => $request->query('status', 'active'),
        ];
        $day = $filters['day'] === 'today' ? $this->today() : (ctype_digit((string) $filters['day']) ? (int) $filters['day'] : null);

        $classes = ClassSchedule::with(['student', 'teacher'])
            ->whereHas('student', fn ($q) => $filters['status'] === 'all' ? $q : $q->where('status', 'active'))
            ->when($filters['status'] !== 'all', fn ($q) => $q->where('status', 'active'))
            ->when($filters['teacher'], fn ($q, $t) => $q->where('teacher_id', $t))
            ->when($day, fn ($q, $d) => $q->onDay($d))
            ->get()
            ->sortBy(fn ($c) => sprintf('%05d-%s', $c->start_minutes, $c->student->name))
            ->values();

        $filters['day_number'] = $day;

        return [$classes, $filters];
    }

    private function today(): int
    {
        return (int) now(Timezones::ACADEMY)->isoWeekday();
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'student_id'       => 'required|exists:students,id',
            'teacher_id'       => 'nullable|exists:teachers,id',
            'course'           => 'nullable|string|max:100',
            'days'             => 'required|array|min:1',
            'days.*'           => ['integer', Rule::in(array_keys(ClassSchedule::DAYS))],
            'start_time'       => ['required', 'regex:/^([01]\d|2[0-3]):[0-5]\d$/'],
            'duration_minutes' => 'required|integer|min:5|max:240',
            'status'           => ['required', Rule::in(array_keys(ClassSchedule::STATUSES))],
            'notes'            => 'nullable|string|max:1000',
        ], [
            'days.required' => 'Pick at least one day.',
            'start_time.regex' => 'Enter the time like 16:30.',
        ]);

        $data['days'] = array_values(array_unique(array_map('intval', $data['days'])));
        sort($data['days']);

        return $data;
    }

    private function backToStudent(ClassSchedule $class, string $message)
    {
        $redirect = redirect()->to(route('admin.students.edit', $class->student_id) . '#classes')->with('success', $message);

        $clashes = $class->clashes();
        if ($clashes->isNotEmpty()) {
            $who = $clashes->map(fn ($c) => $c->student->name . ' (' . $c->days_label . ' ' . $c->time_label . ')')->implode(', ');
            $redirect->with('warning', ($class->teacher?->name ?? 'This teacher') . ' already has a class at this time with: ' . $who . '. Please check.');
        }

        return $redirect;
    }
}
