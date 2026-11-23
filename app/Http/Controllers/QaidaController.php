<?php

namespace App\Http\Controllers;

use App\Models\QaidaLesson;
use App\Support\ContentCache;
use Illuminate\Support\Facades\Storage;

class QaidaController extends Controller
{
    /** /norani-qaida : all takhtiyan */
    public function index()
    {
        $lessons = ContentCache::remember('qaida.lessons', fn () => QaidaLesson::active()
            ->withCount(['items', 'items as audio_count' => fn ($q) => $q->whereNotNull('audio')])
            ->get());

        // Admin > Norani Qaida decides: uploaded PDF, the takhtiyan, or both
        $pdf = setting('qaida_pdf');
        if ($pdf && ! Storage::disk('public')->exists($pdf)) {   // file missing from storage: don't show a broken reader
            $pdf = null;
        }
        $display = setting('qaida_display', 'lessons');
        $pdfUrl = ($pdf && $display !== 'lessons') ? asset('storage/' . $pdf) : null;
        $showLessons = ! $pdfUrl || $display === 'both';

        return view('pages.qaida.index', compact('lessons', 'pdfUrl', 'showLessons'));
    }

    /** /norani-qaida/{slug} : one takhti with its letters/lines */
    public function show(string $slug)
    {
        $lessons = ContentCache::remember('qaida.lessons.nav', fn () => QaidaLesson::active()->get(['id', 'number', 'title', 'slug']));

        $lesson = ContentCache::remember("qaida.lesson.{$slug}", fn () => QaidaLesson::active()
            ->where('slug', $slug)
            ->with('items')
            ->first());

        if (! $lesson) {
            // an old link (title / number was changed in admin): send it to the current URL
            $moved = QaidaLesson::active()->whereJsonContains('old_slugs', $slug)->first(['id', 'slug']);
            abort_unless($moved, 404);

            return redirect()->route('qaida.show', $moved->slug, 301);
        }

        $pos = $lessons->search(fn ($l) => $l->id === $lesson->id);
        $prev = $pos > 0 ? $lessons[$pos - 1] : null;
        $next = $lessons[$pos + 1] ?? null;

        return view('pages.qaida.show', compact('lesson', 'lessons', 'prev', 'next'));
    }
}
