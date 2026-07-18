<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest('sort_order')->get();

        return view('admin.pages.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.pages.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'badge' => 'nullable|string',
            'badge_color' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Course::create($validated);

        return redirect()->back()->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('admin.pages.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'badge' => 'nullable|string',
            'badge_color' => 'nullable|string',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'nullable|numeric',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $course->update($validated);

        return redirect()->back()->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully.');
    }
}
