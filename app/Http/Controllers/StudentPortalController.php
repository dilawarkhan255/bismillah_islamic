<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Student;
use App\Support\AdminPermissions;

/** Public pages that need no login: a student's progress (private link) and certificate check. */
class StudentPortalController extends Controller
{
    /** /progress (admin only): every student's parent page in one list. */
    public function progressIndex()
    {
        $students = Student::withCount('progress')->orderByRaw("status = 'left'")->orderBy('name')->get();

        return response()->view('pages.progress-index', compact('students'))->header('X-Robots-Tag', 'noindex, nofollow');
    }

    /** /certificates (admin only): every certificate issued. */
    public function certificateIndex()
    {
        $certificates = Certificate::with('student')->orderByDesc('issued_on')->orderByDesc('id')->get();

        return response()->view('pages.certificates-index', compact('certificates'))->header('X-Robots-Tag', 'noindex, nofollow');
    }

    /** /progress/{token}: what parents see. Only someone with the link can open it. */
    public function progress(string $token)
    {
        $isAdmin = auth()->user()?->hasRole(AdminPermissions::ADMIN_ROLE) ?? false;

        // a student who left: the link stops working for parents, the admin can still open it
        $student = Student::where('progress_token', $token)
            ->when(! $isAdmin, fn ($q) => $q->where('status', '!=', 'left'))
            ->firstOrFail();

        $student->load([
            'classes' => fn ($q) => $q->active()->with('teacher')->orderBy('start_time'),
            'progress' => fn ($q) => $q->limit(20),
            'certificates',
        ]);

        $recent = $student->progress->where('date', '>=', now()->subDays(60));
        $attended = $recent->whereIn('attendance', ['present', 'late'])->count();
        $counted = $recent->whereIn('attendance', ['present', 'late', 'absent'])->count();
        $attendance = $counted ? (int) round($attended / $counted * 100) : null;

        return response()
            ->view('pages.progress', compact('student', 'attendance'))
            ->header('X-Robots-Tag', 'noindex, nofollow');
    }

    /** /certificate/{serial}: printable certificate; also lets anyone check it is real. */
    public function certificate(Certificate $certificate)
    {
        $certificate->load('student');

        return view('pages.certificate', compact('certificate'));
    }
}
