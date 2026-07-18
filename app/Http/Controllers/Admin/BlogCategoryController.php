<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest('sort_order')->get();

        return view('admin.pages.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.blog-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        BlogCategory::create($validated);

        return redirect()->back()->with('success', 'Blog category created successfully.');
    }

    public function edit(BlogCategory $category)
    {
        return view('admin.pages.blog-categories.edit', compact('category'));
    }

    public function update(Request $request, BlogCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', false);

        $category->update($validated);

        return redirect()->back()->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Blog category deleted successfully.');
    }
}
