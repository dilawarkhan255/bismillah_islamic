<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $selected = $request->get('page');
        $sections = $selected
            ? Section::where('page_name', $selected)->orderBy('sort_order')->get()
            : Section::orderBy('page_name')->orderBy('sort_order')->get();
        $pages = Section::select('page_name')->distinct()->pluck('page_name');
        return view('admin.pages.sections.index', compact('sections', 'pages', 'selected'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_key' => 'required|string|max:255',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sections', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Section::create($validated);

        return redirect()->back()->with('success', 'Block created successfully.');
    }

    public function edit(Section $section)
    {
        return response()->json($section);
    }

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_key' => 'required|string|max:255',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }
            $validated['image'] = $request->file('image')->store('sections', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $section->update($validated);

        return redirect()->back()->with('success', 'Block updated successfully.');
    }

    public function destroy(Request $request, Section $section)
    {
        if ($section->image) {
            Storage::disk('public')->delete($section->image);
        }

        $section->delete();

        return redirect()->back()->with('success', 'Block deleted successfully.');
    }
}
