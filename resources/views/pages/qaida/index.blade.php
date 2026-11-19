@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/qaida.css') }}?v={{ @filemtime(public_path('css/qaida.css')) }}">
@endpush

@section('title', 'Norani Qaida Online — Bismillah Islamic Academy')
@section('meta_description', 'Learn the Norani Qaida online, takhti by takhti: Arabic letters, harakat, tanween, maddah, sukoon and tashdeed, with audio from our qualified teachers.')

@section('content')

    <x-page-hero
        :title="'Norani <span>Qaida</span>'"
        :tag="'Learn to read the Quran'"
        :subtitle="'The first step to reading the Quran: learn the Arabic letters and their sounds, one takhti at a time.'"
        decor="ا ب ت ث ج ح خ"
        :crumbs="['Norani Qaida' => null]"
    />

    @if($pdfUrl)
        <section class="qd-section qd-section--pdf">
            <div class="container">
                <div class="qd-intro">
                    <span class="qd-eyebrow">Read Online</span>
                    <h2 class="qd-h2">The Complete <span>Norani Qaida</span></h2>
                    <p>Turn the pages with the arrows (or swipe on your phone). You can also download it to practise offline.</p>
                </div>
                @include('partials.qaida-pdf-reader', ['pdfUrl' => $pdfUrl])
            </div>
        </section>
    @endif

    @if($showLessons)
    <section class="qd-section">
        <div class="container">
            <div class="qd-intro">
                <span class="qd-eyebrow">{{ $pdfUrl ? 'Practise with audio' : 'Takhtiyan' }}</span>
                <h2 class="qd-h2">Start From <span>Takhti 1</span></h2>
                <p>Go through the lessons in order. Tap any letter to hear how it is pronounced, then repeat it out loud.
                   For corrections and practice, join a live class with one of our teachers.</p>
            </div>

            <div class="row g-4">
                @forelse($lessons as $lesson)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('qaida.show', $lesson->slug) }}" class="qd-lesson-card">
                            <span class="qd-lesson-no">{{ $lesson->number }}</span>
                            <span class="qd-lesson-body">
                                <span class="qd-lesson-kicker">Takhti {{ $lesson->number }}</span>
                                <span class="qd-lesson-title">{{ $lesson->title }}</span>
                                @if($lesson->subtitle)
                                    <span class="qd-lesson-sub">{{ $lesson->subtitle }}</span>
                                @endif
                                <span class="qd-lesson-meta">
                                    <span><i class="fas fa-list"></i> {{ $lesson->items_count }} {{ Str::plural('line', $lesson->items_count) }}</span>
                                    @if($lesson->audio_count > 0)
                                        <span class="qd-has-audio"><i class="fas fa-volume-up"></i> Audio</span>
                                    @endif
                                </span>
                            </span>
                            <i class="fas fa-chevron-right qd-lesson-arrow"></i>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="qd-empty">Lessons are coming soon, In sha Allah.</p>
                    </div>
                @endforelse
            </div>
    @else
    <section class="qd-section pt-0">
        <div class="container">
    @endif

            <div class="qd-cta">
                <div>
                    <h3>Learn with a teacher</h3>
                    <p>A qualified teacher corrects your pronunciation live, one-on-one. Try 3 classes free.</p>
                </div>
                <a href="{{ route('free_trial') }}" class="qd-btn">Book Free Trial <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

@endsection
