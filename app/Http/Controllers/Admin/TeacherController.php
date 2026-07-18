<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest('sort_order')->get();

        return view('admin.pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.pages.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('teachers', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.pages.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $validated['image'] = $request->file('image')->store('teachers', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $teacher->update($validated);

        return redirect()->back()->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image);
        }

        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher deleted successfully.');
    }
}
