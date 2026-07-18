<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::latest('sort_order')->get();

        return view('admin.pages.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.pages.hero-slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'nullable|string',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'btn1_text' => 'nullable|string',
            'btn1_url' => 'nullable|string',
            'btn2_text' => 'nullable|string',
            'btn2_url' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        HeroSlide::create($validated);

        return redirect()->back()->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.pages.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'badge' => 'nullable|string',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'btn1_text' => 'nullable|string',
            'btn1_url' => 'nullable|string',
            'btn2_text' => 'nullable|string',
            'btn2_url' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($heroSlide->image) {
                Storage::disk('public')->delete($heroSlide->image);
            }
            $validated['image'] = $request->file('image')->store('hero-slides', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $heroSlide->update($validated);

        return redirect()->back()->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        if ($heroSlide->image) {
            Storage::disk('public')->delete($heroSlide->image);
        }

        $heroSlide->delete();

        return redirect()->back()->with('success', 'Hero slide deleted successfully.');
    }
}
