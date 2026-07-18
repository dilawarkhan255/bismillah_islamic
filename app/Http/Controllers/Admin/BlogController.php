<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('category')->latest()->get();
        $categories = BlogCategory::active()->get();

        return view('admin.pages.blog.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::active()->get();

        return view('admin.pages.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'read_time' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_featured'] = $request->boolean('is_featured', false);

        BlogPost::create($validated);

        return redirect()->back()->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::active()->get();

        return view('admin.pages.blog.edit', compact('post', 'categories'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'read_time' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);
        $validated['is_featured'] = $request->boolean('is_featured', false);

        $post->update($validated);

        return redirect()->back()->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Blog post deleted successfully.');
    }
}
