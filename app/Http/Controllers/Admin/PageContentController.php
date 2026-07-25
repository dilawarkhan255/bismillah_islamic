<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    protected array $pages = [
        'home' => [
            'name' => 'Home Page',
            'icon' => 'bi-house-door',
            'color' => '#0d6efd',
            'description' => 'Hero slider, stats, features, how it works, journey, ayah banner.',
        ],
        'about' => [
            'name' => 'About Page',
            'icon' => 'bi-info-circle',
            'color' => '#198754',
            'description' => 'Mission, story, certifications, trust badges, CTA.',
        ],
        'contact' => [
            'name' => 'Contact Page',
            'icon' => 'bi-envelope',
            'color' => '#fd7e14',
            'description' => 'Contact info cards, form header, class hours, social links.',
        ],
        'gallery' => [
            'name' => 'Gallery Page',
            'icon' => 'bi-images',
            'color' => '#6f42c1',
            'description' => 'Section title and CTA banner.',
        ],
        'blog' => [
            'name' => 'Blog Page',
            'icon' => 'bi-journal-text',
            'color' => '#20c997',
            'description' => 'Page title, sidebar widgets, Quran verse, CTA.',
        ],
        'pricing' => [
            'name' => 'Pricing Page',
            'icon' => 'bi-cash-stack',
            'color' => '#dc3545',
            'description' => 'Trust badges, comparison table, courses list, CTA.',
        ],
        'free-trial' => [
            'name' => 'Free Trial Page',
            'icon' => 'bi-calendar-check',
            'color' => '#0dcaf0',
            'description' => 'Badges, how it works steps, sidebar contact info.',
        ],
        'team' => [
            'name' => 'Team Page',
            'icon' => 'bi-people',
            'color' => '#ffc107',
            'description' => 'CTA banner for teachers listing.',
        ],
        'our-team' => [
            'name' => 'Our Team Page',
            'icon' => 'bi-person-video3',
            'color' => '#198754',
            'description' => 'CTA banner for detailed team page.',
        ],
        'privacy-policy' => [
            'name' => 'Privacy Policy',
            'icon' => 'bi-shield-lock',
            'color' => '#6c757d',
            'description' => 'Commitment banner, 10 policy sections, CTA.',
        ],
        'footer' => [
            'name' => 'Footer',
            'icon' => 'bi-layout-bottom',
            'color' => '#343a40',
            'description' => 'Address, phone numbers, email, social links, newsletter, copyright.',
        ],
    ];

    public function index()
    {
        $pages = $this->pages;
        $counts = Section::selectRaw('page_name, COUNT(*) as count')
            ->groupBy('page_name')
            ->pluck('count', 'page_name');

        return view('admin.pages.page-content.index', compact('pages', 'counts'));
    }

    public function show(string $page)
    {
        if (!isset($this->pages[$page])) {
            abort(404);
        }

        $pageConfig = $this->pages[$page];
        $sections = Section::where('page_name', $page)->orderBy('sort_order')->get();

        return view('admin.pages.page-content.show', compact('page', 'pageConfig', 'sections'));
    }

    public function store(Request $request, string $page)
    {
        if (!isset($this->pages[$page])) {
            abort(404);
        }

        $validated = $request->validate([
            'section_key' => 'required|string',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'after_section' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $afterSection = $validated['after_section'] ?? 'last';
        unset($validated['after_section']);

        $validated['page_name'] = $page;
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sections', 'public');
        }

        if ($afterSection === '0') {
            $validated['sort_order'] = 0;
            Section::create($validated);
            $this->reindexSortOrder($page);
        } elseif ($afterSection === 'last') {
            $maxOrder = Section::where('page_name', $page)->max('sort_order') ?? 0;
            $validated['sort_order'] = $maxOrder + 1;
            Section::create($validated);
        } else {
            $after = Section::find($afterSection);
            if ($after && $after->page_name === $page) {
                $validated['sort_order'] = $after->sort_order + 0.5;
                Section::create($validated);
                $this->reindexSortOrder($page);
            } else {
                $maxOrder = Section::where('page_name', $page)->max('sort_order') ?? 0;
                $validated['sort_order'] = $maxOrder + 1;
                Section::create($validated);
            }
        }

        return redirect()->route('admin.page-content.show', $page)->with('success', 'Section added successfully.');
    }

    protected function reindexSortOrder(string $page): void
    {
        $sections = Section::where('page_name', $page)->orderBy('sort_order')->get();
        foreach ($sections as $i => $s) {
            $s->update(['sort_order' => $i + 1]);
        }
    }

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($section->image) {
                \Storage::disk('public')->delete($section->image);
            }
            $validated['image'] = $request->file('image')->store('sections', 'public');
        }

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        $section->update($validated);

        return redirect()->route('admin.page-content.show', $section->page_name)->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $page = $section->page_name;

        if ($section->image) {
            \Storage::disk('public')->delete($section->image);
        }

        $section->delete();

        return redirect()->route('admin.page-content.show', $page)->with('success', 'Section deleted successfully.');
    }

    public function edit(Section $section)
    {
        return response()->json($section);
    }
}
