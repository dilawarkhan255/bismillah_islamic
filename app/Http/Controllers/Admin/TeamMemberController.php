<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest('sort_order')->get();
        return view('admin.pages.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.pages.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'short_bio' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'experience' => 'nullable|string',
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
            $validated['image'] = $request->file('image')->store('team-members', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.pages.team-members.edit', ['member' => $teamMember]);
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'short_bio' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'experience' => 'nullable|string',
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
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $validated['image'] = $request->file('image')->store('team-members', 'public');
        }

        if ($request->input('name') !== $teamMember->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->back()->with('success', 'Team member deleted successfully.');
    }
}
