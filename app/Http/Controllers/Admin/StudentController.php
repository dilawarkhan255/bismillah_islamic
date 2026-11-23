<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use App\Models\Course;
use App\Models\FreeTrial;
use App\Models\Student;
use App\Models\Teacher;
use App\Support\Timezones;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'active');

        $students = Student::withCount(['classes as active_classes_count' => fn ($q) => $q->active()])
            ->when($status !== 'all', fn ($q) => $q->where('status', $status))
            ->orderBy('name')
            ->get();

        $counts = Student::selectRaw('status, count(*) as n')->groupBy('status')->pluck('n', 'status');

        return view('admin.pages.students.index', compact('students', 'status', 'counts'));
    }

    public function create(Request $request)
    {
        $student = new Student(['status' => 'active', 'timezone' => Timezones::ACADEMY, 'fee_currency' => 'PKR', 'fee_due_day' => 5]);

        return view('admin.pages.students.form', $this->formData($student));
    }

    public function store(Request $request)
    {
        $student = Student::create($this->validated($request));

        return redirect()->route('admin.students.edit', $student)
            ->with('success', 'Student added. Now add their class times below.');
    }

    public function edit(Student $student)
    {
        $student->load([
            'classes' => fn ($q) => $q->with('teacher')->orderBy('start_time'),
            'progress' => fn ($q) => $q->limit(15),
            'payments' => fn ($q) => $q->limit(12),
            'certificates',
        ]);

        return view('admin.pages.students.form', $this->formData($student));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($this->validated($request));

        return redirect()->route('admin.students.edit', $student)->with('success', 'Student saved.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student and their classes deleted.');
    }

    public function bulkDestroy(Request $request)
    {
        $validated = $request->validate(['ids' => 'required|array|min:1', 'ids.*' => 'integer']);

        $count = Student::whereIn('id', $validated['ids'])->delete();

        return redirect()->route('admin.students.index')
            ->with('success', $count . ' ' . str('student')->plural($count) . ' deleted.');
    }

    /** Free trial approved: make it a student without typing the details again. */
    public function fromFreeTrial(FreeTrial $freeTrial)
    {
        $existing = Student::where('free_trial_id', $freeTrial->id)->first();
        if ($existing) {
            return redirect()->route('admin.students.edit', $existing)->with('success', 'This free trial is already a student.');
        }

        $student = Student::create([
            'name'          => $freeTrial->student_name,
            'parent_name'   => $freeTrial->parent_name,
            'whatsapp'      => $freeTrial->whatsapp_number ?: $freeTrial->phone,
            'email'         => $freeTrial->email,
            'country'       => $freeTrial->country,
            'timezone'      => Timezones::guessFromCountry($freeTrial->country),
            'course'        => $freeTrial->course,
            'status'        => 'active',
            'start_date'    => now(Timezones::ACADEMY)->toDateString(),
            'notes'         => $freeTrial->preferred_time ? 'Preferred time (from free trial): ' . $freeTrial->preferred_time : null,
            'free_trial_id' => $freeTrial->id,
        ]);

        if ($freeTrial->status === 'pending') {
            $freeTrial->update(['status' => 'approved']);
        }

        return redirect()->route('admin.students.edit', $student)
            ->with('success', 'Student created from the free trial. Check the timezone, then add their class times.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'parent_name' => 'nullable|string|max:100',
            'whatsapp'    => 'nullable|string|max:30',
            'email'       => 'nullable|email|max:100',
            'country'     => 'nullable|string|max:60',
            'timezone'    => ['required', Rule::in(Timezones::zones())],
            'course'      => 'nullable|string|max:100',
            'status'      => ['required', Rule::in(array_keys(Student::STATUSES))],
            'start_date'  => 'nullable|date',
            'notes'       => 'nullable|string|max:2000',
            'fee_amount'   => 'nullable|numeric|min:0|max:9999999',
            'fee_currency' => ['nullable', Rule::in(array_keys(Student::CURRENCIES))],
            'fee_due_day'  => 'nullable|integer|min:1|max:28',
        ]);

        $data['fee_currency'] = $data['fee_currency'] ?? 'PKR';
        $data['fee_due_day'] = $data['fee_due_day'] ?? 5;

        return $data;
    }

    private function formData(Student $student): array
    {
        return [
            'student'  => $student,
            'teachers' => Teacher::orderBy('sort_order')->orderBy('name')->get(['id', 'name']),
            'courses'  => Course::orderBy('title')->pluck('title'),
            'days'     => ClassSchedule::DAYS,
        ];
    }
}
