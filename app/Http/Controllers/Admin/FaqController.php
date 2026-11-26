<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

/** Admin > Chatbot FAQs: what the website chatbot answers. */
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.pages.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] ??= (Faq::max('sort_order') ?? 0) + 1;
        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'Question added to the chatbot.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.pages.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validated($request));

        return redirect()->route('admin.faqs.index')->with('success', 'Question saved.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'Question deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'question'    => 'required|string|max:255',
            'answer'      => 'required|string|max:2000',
            'keywords'    => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:60|required_with:button_url',
            'button_url'  => 'nullable|string|max:255|required_with:button_text',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
