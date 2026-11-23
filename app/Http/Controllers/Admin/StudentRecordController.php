<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\FeePayment;
use App\Models\Student;
use App\Models\StudentProgress;
use App\Support\Timezones;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

/** Progress reports, fee payments and certificates on a student's page. */
class StudentRecordController extends Controller
{
    // ── Progress ─────────────────────────────────────────────

    public function storeProgress(Request $request, Student $student)
    {
        $data = $request->validate([
            'date'       => 'required|date',
            'attendance' => ['required', Rule::in(array_keys(StudentProgress::ATTENDANCE))],
            'lesson'     => 'nullable|string|max:255',
            'note'       => 'nullable|string|max:2000',
        ]);

        $student->progress()->create($data);

        return $this->back($student, 'Class report added. Parents see it on their progress link.', 'progress');
    }

    public function destroyProgress(StudentProgress $progress)
    {
        $student = $progress->student;
        $progress->delete();

        return $this->back($student, 'Report deleted.', 'progress');
    }

    public function updateLevel(Request $request, Student $student)
    {
        $student->update($request->validate([
            'current_level'    => 'nullable|string|max:255',
            'progress_percent' => 'required|integer|min:0|max:100',
        ]));

        return $this->back($student, 'Progress updated.', 'progress');
    }

    /** New parent link; the old one stops working. */
    public function resetLink(Student $student)
    {
        $student->forceFill(['progress_token' => Str::random(32)])->save();

        return $this->back($student, 'New parent link created. The old link no longer works.', 'progress');
    }

    // ── Fees ─────────────────────────────────────────────────

    public function storePayment(Request $request, Student $student)
    {
        $data = $request->validate([
            'month'    => 'required|date_format:Y-m',
            'amount'   => 'required|numeric|min:0|max:9999999',
            'currency' => ['required', Rule::in(array_keys(Student::CURRENCIES))],
            'paid_on'  => 'required|date',
            'method'   => 'nullable|string|max:30',
            'note'     => 'nullable|string|max:255',
        ]);
        $month = CarbonImmutable::createFromFormat('Y-m-d', $data['month'] . '-01')->toDateString();

        $student->payments()->updateOrCreate(['month' => $month], ['month' => $month] + $data);

        $redirect = $request->input('return') === 'fees'
            ? redirect()->route('admin.fees.index', ['month' => $data['month']])
            : $this->back($student, null, 'fees');

        return $redirect->with('success', 'Fee for ' . CarbonImmutable::parse($month)->format('F Y') . ' marked as paid.');
    }

    public function destroyPayment(Request $request, FeePayment $payment)
    {
        $student = $payment->student;
        $month = $payment->month->format('Y-m');
        $payment->delete();

        return $request->input('return') === 'fees'
            ? redirect()->route('admin.fees.index', ['month' => $month])->with('success', 'Payment removed.')
            : $this->back($student, 'Payment removed.', 'fees');
    }

    // ── Certificates ─────────────────────────────────────────

    public function storeCertificate(Request $request, Student $student)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:150',
            'course'       => 'nullable|string|max:100',
            'teacher_name' => 'nullable|string|max:100',
            'issued_on'    => 'required|date',
        ]);

        $cert = $student->certificates()->create($data);

        return $this->back($student, "Certificate {$cert->serial} created. Click Print to open it.", 'certificates');
    }

    public function destroyCertificate(Certificate $certificate)
    {
        $student = $certificate->student;
        $certificate->delete();

        return $this->back($student, 'Certificate deleted.', 'certificates');
    }

    private function back(Student $student, ?string $message, string $section)
    {
        $redirect = redirect()->to(route('admin.students.edit', $student) . '#' . $section);

        return $message ? $redirect->with('success', $message) : $redirect;
    }
}
