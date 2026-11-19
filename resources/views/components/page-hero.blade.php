{{--
    One banner design for every inner page (styles: public/css/site.css → "Page hero").

    <x-page-hero
        title="Our Islamic <span>Courses</span>"      HTML allowed; the <span> part is shown in gold.
                                                      Plain titles get their last word in gold automatically.
        tag="Bismillah Islamic Academy"               small boxed line above the title (optional)
        subtitle="..."                                text under the title (optional)
        image="https://.../bg.jpg"                    background photo (optional)
        decor="ا ب ت ث ج"                           large faint Arabic letters behind the text instead of a photo (optional)
        :crumbs="['Our Teachers' => route('team'), 'Name' => null]"   breadcrumb after "Home"; last one is the current page
    >
        optional extra content (badges, buttons) under the subtitle
    </x-page-hero>
--}}
@props([
    'title',
    'tag' => 'Bismillah Islamic Academy',
    'subtitle' => null,
    'image' => null,
    'decor' => null,
    'crumbs' => [],
])

@php
    $heading = (string) $title;
    if (! str_contains($heading, '<span')) {
        // "About Us" -> "About <span>Us</span>" so every banner has the same gold accent
        $words = preg_split('/\s+/', trim(e($heading)));
        $last = array_pop($words);
        $heading = trim(implode(' ', $words) . ' <span>' . $last . '</span>');
    }
@endphp

<section class="ph {{ $decor ? 'ph--decor' : '' }}">
    @if($image)
        <div class="ph-bg"><img src="{{ $image }}" alt="" fetchpriority="high"></div>
    @endif
    @if($decor)
        <div class="ph-decor" aria-hidden="true" lang="ar">{{ $decor }}</div>
    @endif
    <div class="ph-overlay"></div>
    <div class="ph-pattern"></div>
    <div class="ph-line ph-line--l"></div>
    <div class="ph-line ph-line--r"></div>

    <div class="container ph-inner">
        <div class="ph-arabic ph-rise">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
        @if($tag)
            <div class="ph-tag ph-rise" style="animation-delay:.08s;">✦ {{ $tag }} ✦</div>
        @endif
        <h1 class="ph-title ph-rise" style="animation-delay:.16s;">{!! $heading !!}</h1>
        @if($subtitle)
            <p class="ph-sub ph-rise" style="animation-delay:.24s;">{{ $subtitle }}</p>
        @endif

        @if(trim($slot) !== '')
            <div class="ph-extra ph-rise" style="animation-delay:.32s;">{{ $slot }}</div>
        @endif

        <nav aria-label="breadcrumb" class="ph-rise" style="animation-delay:.4s;">
            <ol class="ph-crumbs">
                <li><a href="{{ route('home') }}">Home</a></li>
                @foreach($crumbs as $label => $url)
                    @if($url && ! $loop->last)
                        <li><a href="{{ $url }}">{{ $label }}</a></li>
                    @else
                        <li aria-current="page">{{ $label }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</section>
