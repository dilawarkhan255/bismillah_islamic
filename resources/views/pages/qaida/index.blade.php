@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/qaida.css') }}?v={{ @filemtime(public_path('css/qaida.css')) }}">
@endpush

@section('title', 'Norani Qaida Online — Bismillah Islamic Academy')
@section('meta_description', 'Read the complete Norani Qaida online, page by page: Arabic letters, harakat, tanween, maddah, sukoon and tashdeed. Learn it live with our qualified teachers.')

@section('content')

    <x-page-hero
        :title="'Norani <span>Qaida</span>'"
        :tag="'Learn to read the Quran'"
        :subtitle="'The first step to reading the Quran: learn the Arabic letters and their sounds.'"
        decor="ا ب ت ث ج ح خ"
        :crumbs="['Norani Qaida' => null]"
    />

    <section class="qd-section qd-section--pdf">
        <div class="container">
            @if($pdfUrl)
                <div class="qd-intro">
                    <span class="qd-eyebrow">Read Online</span>
                    <h2 class="qd-h2">The Complete <span>Norani Qaida</span></h2>
                    <p>Turn the pages with the arrows (or swipe on your phone). You can also download it to practise offline.</p>
                </div>
                @include('partials.qaida-pdf-reader', ['pdfUrl' => $pdfUrl])
            @else
                <p class="qd-empty">The Norani Qaida is coming soon, In sha Allah.</p>
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
