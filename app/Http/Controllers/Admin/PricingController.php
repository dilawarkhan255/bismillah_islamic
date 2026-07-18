<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::latest('sort_order')->get();

        return view('admin.pages.pricing.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'badge' => 'nullable|string',
            'accent_color' => 'nullable|string|max:7',
            'days_per_week' => 'nullable|string',
            'classes_per_month' => 'nullable|string',
            'courses_count' => 'nullable|string',
            'report_frequency' => 'nullable|string',
            'certificate' => 'nullable|boolean',
            'features' => 'nullable|array',
            'is_popular' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['certificate'] = $request->boolean('certificate', false);
        $validated['is_popular'] = $request->boolean('is_popular', false);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        PricingPlan::create($validated);

        return redirect()->back()->with('success', 'Pricing plan created successfully.');
    }

    public function edit(PricingPlan $plan)
    {
        return view('admin.pages.pricing.edit', compact('plan'));
    }

    public function update(Request $request, PricingPlan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'badge' => 'nullable|string',
            'accent_color' => 'nullable|string|max:7',
            'days_per_week' => 'nullable|string',
            'classes_per_month' => 'nullable|string',
            'courses_count' => 'nullable|string',
            'report_frequency' => 'nullable|string',
            'certificate' => 'nullable|boolean',
            'features' => 'nullable|array',
            'is_popular' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['certificate'] = $request->boolean('certificate', false);
        $validated['is_popular'] = $request->boolean('is_popular', false);
        $validated['is_active'] = $request->boolean('is_active', false);

        $plan->update($validated);

        return redirect()->back()->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy(PricingPlan $plan)
    {
        $plan->delete();

        return redirect()->back()->with('success', 'Pricing plan deleted successfully.');
    }
}
