<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::latest('sort_order')->get();

        return view('admin.pages.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'category' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['image'] = $request->file('image')->store('gallery', 'public');
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        GalleryItem::create($validated);

        return redirect()->back()->with('success', 'Gallery item created successfully.');
    }

    public function edit(GalleryItem $item)
    {
        return view('admin.pages.gallery.edit', compact('item'));
    }

    public function update(Request $request, GalleryItem $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $item->update($validated);

        return redirect()->back()->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->back()->with('success', 'Gallery item deleted successfully.');
    }
}
