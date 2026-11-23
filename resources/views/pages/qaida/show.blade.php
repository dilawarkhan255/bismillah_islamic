@extends('layouts.app')

@push('page-css')
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/qaida.css') }}?v={{ @filemtime(public_path('css/qaida.css')) }}">
@endpush

@section('title', 'Takhti ' . $lesson->number . ': ' . $lesson->title . ' — Norani Qaida')
@section('meta_description', Str::limit('Norani Qaida Takhti ' . $lesson->number . ' (' . $lesson->title . '). ' . $lesson->description, 155))

@php
    // Urdu digits for the takhti number, as printed in the Qaida
    $urduNo = strtr((string) $lesson->number, ['0' => '۰', '1' => '۱', '2' => '۲', '3' => '۳', '4' => '۴', '5' => '۵', '6' => '۶', '7' => '۷', '8' => '۸', '9' => '۹']);
    $isLetters = $lesson->number === 1;
@endphp

@section('content')

    <x-page-hero
        :title="'Takhti ' . $lesson->number . ': <span>' . e($lesson->title) . '</span>'"
        :tag="'Norani Qaida'"
        :subtitle="$lesson->subtitle"
        decor="ا ب ت ث ج ح خ"
        :crumbs="['Norani Qaida' => route('qaida'), 'Takhti ' . $lesson->number => null]"
    />

    <section class="qd-section">
        <div class="container">

            {{-- Takhti switcher --}}
            <nav class="qd-switcher" aria-label="Takhtiyan">
                @foreach($lessons as $l)
                    <a href="{{ route('qaida.show', $l->slug) }}" class="{{ $l->id === $lesson->id ? 'is-active' : '' }}"
                       title="Takhti {{ $l->number }}: {{ $l->title }}" @if($l->id === $lesson->id) aria-current="page" @endif>{{ $l->number }}</a>
                @endforeach
            </nav>

            {{-- ═══ The takhti, laid out like the printed Qaida page ═══ --}}
            <article class="qd-book" dir="rtl" lang="ur">

                <header class="qd-book-head">
                    <div class="qd-book-no">تختی نمبر <span>{{ $urduNo }}</span></div>
                    <div class="qd-book-bismillah" lang="ar">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
                    <div class="qd-book-title">{{ $lesson->title_ur ?: $lesson->title }}</div>
                </header>

                @if($lesson->description_ur)
                    <div class="qd-book-hidayat">
                        <span class="qd-hd-label">ہدایات</span>
                        <p>{{ $lesson->description_ur }}</p>
                    </div>
                @endif

                @if($lesson->audio)
                    <div class="qd-book-listen" dir="ltr">
                        <button type="button" class="qd-play-all js-qd-play" data-src="{{ asset('storage/' . $lesson->audio) }}">
                            <i class="fas fa-play"></i> Listen to the whole takhti
                        </button>
                    </div>
                @endif

                <div class="qd-book-grid {{ $isLetters ? 'is-letters' : 'is-lines' }}">
                    @foreach($lesson->items as $i => $item)
                        @php $tone = 'qd-c' . ($i % 4); @endphp
                        @if($item->audio)
                            <button type="button" class="qd-cell has-audio js-qd-play {{ $tone }}" data-src="{{ asset('storage/' . $item->audio) }}"
                                    aria-label="Play {{ $item->transliteration ?: $item->text }}">
                        @else
                            <div class="qd-cell {{ $tone }}">
                        @endif
                                @if($item->hint)
                                    <span class="qd-hint" lang="ur">{{ $item->hint }}</span>
                                @endif
                                <span class="qd-glyph" lang="ar">{{ $item->text }}</span>
                                @if($item->transliteration)
                                    <span class="qd-cell-translit" dir="ltr" lang="en">{{ $item->transliteration }}</span>
                                @endif
                                @if($item->audio)
                                    <span class="qd-cell-audio"><i class="fas fa-volume-up"></i></span>
                                @endif
                        @if($item->audio)
                            </button>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>

                @if(!empty($lesson->groups))
                    <div class="qd-groups">
                        @foreach($lesson->groups as $g => $group)
                            <div class="qd-group qd-g{{ $g % 6 }} {{ count($group['chips'] ?? []) > 1 ? 'is-wide' : '' }}">
                                <div class="qd-group-title">
                                    <strong>{{ $group['title'] ?? '' }}</strong>
                                    @if(!empty($group['title_en']))
                                        <small dir="ltr" lang="en">{{ $group['title_en'] }}</small>
                                    @endif
                                </div>
                                <div class="qd-chips" lang="ar">
                                    @foreach($group['chips'] ?? [] as $chip)
                                        <span class="qd-chip">{{ $chip }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </article>

            {{-- English guidance --}}
            @if($lesson->description)
                <div class="qd-howto">
                    <i class="fas fa-lightbulb"></i>
                    <div>
                        <strong>How to read this takhti</strong>
                        <p>{{ $lesson->description }}</p>
                    </div>
                </div>
            @endif

            @unless($lesson->audio || $lesson->items->contains(fn ($i) => $i->audio))
                <p class="qd-audio-note"><i class="fas fa-info-circle"></i> Audio for this takhti is being recorded by our teachers and will be added soon, In sha Allah.</p>
            @endunless

            {{-- Previous / next takhti --}}
            <div class="qd-pager">
                @if($prev)
                    <a href="{{ route('qaida.show', $prev->slug) }}" class="qd-pager-link">
                        <i class="fas fa-arrow-left"></i>
                        <span><small>Previous</small>Takhti {{ $prev->number }}: {{ $prev->title }}</span>
                    </a>
                @else
                    <a href="{{ route('qaida') }}" class="qd-pager-link"><i class="fas fa-th-large"></i><span><small>Back to</small>All takhtiyan</span></a>
                @endif

                @if($next)
                    <a href="{{ route('qaida.show', $next->slug) }}" class="qd-pager-link qd-pager-link--next">
                        <span><small>Next</small>Takhti {{ $next->number }}: {{ $next->title }}</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <a href="{{ route('free_trial') }}" class="qd-pager-link qd-pager-link--next">
                        <span><small>Well done!</small>Continue with a teacher</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>

    <audio id="qdPlayer" preload="none"></audio>

@endsection

@push('scripts')
<script>
    (function () {
        var player = document.getElementById('qdPlayer');
        var current = null;

        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.js-qd-play');
            if (!btn) return;

            if (current === btn && !player.paused) {      // tap again to stop
                player.pause();
                return;
            }
            player.src = btn.dataset.src;
            player.currentTime = 0;
            player.play().catch(function () {});
            if (current) current.classList.remove('is-playing');
            current = btn;
            btn.classList.add('is-playing');
        });

        ['ended', 'pause'].forEach(function (ev) {
            player.addEventListener(ev, function () { if (current) current.classList.remove('is-playing'); });
        });
    })();
</script>
@endpush
