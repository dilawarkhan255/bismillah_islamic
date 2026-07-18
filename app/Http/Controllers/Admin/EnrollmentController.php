<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::latest()->get();

        return view('admin.pages.enrollments.index', compact('enrollments'));
    }

    public function show(Enrollment $enrollment)
    {
        return view('admin.pages.enrollments.show', compact('enrollment'));
    }

    public function updateStatus(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $enrollment->update($validated);

        return redirect()->back()->with('success', 'Enrollment status updated successfully.');
    }
}
