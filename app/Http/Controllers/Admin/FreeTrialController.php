<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreeTrial;
use Illuminate\Http\Request;

class FreeTrialController extends Controller
{
    public function index()
    {
        $freeTrials = FreeTrial::latest()->get();

        return view('admin.pages.free-trials.index', compact('freeTrials'));
    }

    public function show(FreeTrial $freeTrial)
    {
        return view('admin.pages.free-trials.show', compact('freeTrial'));
    }

    public function updateStatus(Request $request, FreeTrial $freeTrial)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $freeTrial->update($validated);

        return redirect()->back()->with('success', 'Free trial status updated successfully.');
    }

    public function destroy(FreeTrial $freeTrial)
    {
        $freeTrial->delete();

        return redirect()->route('admin.free-trials.index')->with('success', 'Free trial request deleted successfully.');
    }
}
