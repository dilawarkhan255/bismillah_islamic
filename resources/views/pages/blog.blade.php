@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}?v={{ @filemtime(public_path('css/blog.css')) }}">
@endpush

@section('title', 'Articles & Blog — Bismillah Islamic Academy')
@section('meta_description', 'Articles on Quran learning, Tajweed, Hifz tips and Islamic knowledge for students and parents.')

@section('content')




    {{-- FEATURED HERO --}}
    @if($featured)
    <section class="bbl-featured">
        <div class="bbl-featured-bg">
            <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}">
            <div class="bbl-featured-scrim"></div>
        </div>

        <div class="container" style="position:relative; z-index:3;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-10">

                    <nav style="margin-bottom:22px;">
                        <ol class="breadcrumb mb-0 justify-content-center" style="background:transparent; padding:0;">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"
                                    style="color:rgba(255,255,255,0.5); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                            </li>
                            <li style="color:rgba(255,255,255,0.3); padding:0 8px; font-size:13px; list-style:none;">›</li>
                            <li
                                style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px; list-style:none;">
                                Blog</li>
                        </ol>
                    </nav>

                    @if($featured->category)
                    <div class="bbl-feat-cat-wrap">
                        <span class="bbl-feat-cat" style="background:{{ $featured->category->color }};">{{ $featured->category->name }}</span>
                    </div>
                    @endif
                    <h1 class="bbl-feat-title bbl-reveal" style="animation-delay:.1s;">{{ $featured->title }}</h1>
                    <div class="bbl-feat-meta bbl-reveal justify-content-center" style="animation-delay:.25s;">
                        <span><i class="fas fa-user-circle"></i> {{ $featured->author }}</span>
                        @if($featured->published_at)
                            <span><i class="fas fa-calendar-alt"></i> {{ $featured->published_at->format('F j, Y') }}</span>
                        @endif
                        @if($featured->read_time_label)
                            <span><i class="far fa-clock"></i> {{ $featured->read_time_label }}</span>
                        @endif
                    </div>
                    <p class="bbl-feat-excerpt bbl-reveal" style="animation-delay:.4s;">
                        {{ $featured->excerpt }}
                    </p>
                    <div class="bbl-feat-btn-wrap bbl-reveal" style="animation-delay:.55s;">
                        <a href="{{ route('blog.show', $featured->slug) }}" class="bbl-feat-btn">
                            Read Article <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="bbl-particles">
            @for($p = 1; $p <= 8; $p++)
                <div class="bbl-particle"
                    style="left:{{ rand(5, 95) }}%; animation-delay:{{ $p * .6 }}s; animation-duration:{{ 4 + ($p % 3) }}s;">
                </div>
            @endfor
        </div>
    </section>
    @endif


    {{-- MAIN CONTENT + SIDEBAR --}}
    <section class="bbl-main">
        <div class="container">
            <div class="row g-5">

                {{-- POSTS LIST --}}
                <div class="col-lg-8">

                    <div class="bbl-posts-heading bbl-sr" data-dir="up">
                        <div>
                            @if($search !== '')
                                <span class="bbl-eyebrow">Search results</span>
                                <h2 class="bbl-h2">“{{ $search }}”</h2>
                            @elseif($activeCategory)
                                <span class="bbl-eyebrow">Category</span>
                                <h2 class="bbl-h2">{{ $activeCategory->name }}</h2>
                            @else
                                <span class="bbl-eyebrow">{{ section('blog', 'latest_title', 'description', 'Islamic Knowledge') }}</span>
                                <h2 class="bbl-h2">{!! section('blog', 'latest_title', 'title', 'Latest <span>Articles</span>') !!}</h2>
                            @endif
                        </div>
                        <div class="bbl-gold-rule"></div>
                    </div>

                    @if($search !== '' || $activeCategory)
                        <p class="bbl-filter-note">
                            {{ $posts->total() }} {{ Str::plural('article', $posts->total()) }} found.
                            <a href="{{ route('blog') }}">Show all articles <i class="fas fa-times"></i></a>
                        </p>
                    @endif

                    @forelse($posts as $pi => $post)
                        <article class="bbl-card bbl-sr" data-dir="up" style="transition-delay:{{ ($pi % 3) * .1 }}s;">

                            {{-- Image --}}
                            <a href="{{ route('blog.show', $post->slug) }}" class="bbl-card-thumb" tabindex="-1" aria-hidden="true">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" loading="lazy">
                                <div class="bbl-card-thumb-overlay"></div>
                                @if($post->category)
                                    <span class="bbl-card-badge"
                                        style="background:{{ $post->category->color }};">{{ $post->category->name }}</span>
                                @endif
                                @if($post->read_time_label)
                                    <span class="bbl-card-read-badge">{{ $post->read_time_label }}</span>
                                @endif
                            </a>

                            {{-- Body --}}
                            <div class="bbl-card-body">
                                <div class="bbl-card-meta">
                                    <span><i class="fas fa-user-circle"></i> {{ $post->author }}</span>
                                    @if($post->published_at)
                                        <span><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F j, Y') }}</span>
                                    @endif
                                </div>
                                <h3 class="bbl-card-title">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="bbl-card-link">{{ $post->title }}</a>
                                </h3>
                                <p class="bbl-card-excerpt">{{ $post->excerpt }}</p>
                                <div class="bbl-card-footer">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="bbl-read-more">
                                        Read Article <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                    <div class="bbl-card-icons">
                                        <button type="button" class="bbl-icon-btn js-share" title="Share"
                                            data-url="{{ route('blog.show', $post->slug) }}" data-title="{{ $post->title }}">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="bbl-card-number">{{ str_pad($posts->firstItem() + $pi, 2, '0', STR_PAD_LEFT) }}</div>

                        </article>
                    @empty
                        <div class="bbl-empty">
                            <i class="fas fa-book-open"></i>
                            <h3>No articles found</h3>
                            <p>Try a different search word or browse all articles.</p>
                            <a href="{{ route('blog') }}" class="bbl-read-more">View all articles <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    @endforelse

                    @if($posts->hasPages())
                        <nav class="bbl-pagination d-flex justify-content-center flex-wrap gap-2 w-100" aria-label="Blog pages">
                            @if(!$posts->onFirstPage())
                                <a href="{{ $posts->previousPageUrl() }}" class="bbl-pg" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
                            @endif
                            @foreach($posts->getUrlRange(1, $posts->lastPage()) as $num => $url)
                                <a href="{{ $url }}" class="bbl-pg {{ $num === $posts->currentPage() ? 'bbl-pg--active' : '' }}"
                                   @if($num === $posts->currentPage()) aria-current="page" @endif>{{ str_pad($num, 2, '0', STR_PAD_LEFT) }}</a>
                            @endforeach
                            @if($posts->hasMorePages())
                                <a href="{{ $posts->nextPageUrl() }}" class="bbl-pg" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
                            @endif
                        </nav>
                    @endif

                </div>

                {{-- SIDEBAR --}}
                @include('partials.blog-sidebar')
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function () {
            var els = document.querySelectorAll('.bbl-sr');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
                    });
                }, { threshold: 0.08 });
                els.forEach(function (el) { io.observe(el); });
            } else {
                els.forEach(function (el) { el.classList.add('in'); });
            }

            document.querySelectorAll('.bbl-card').forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var r = card.getBoundingClientRect();
                    var ry = ((e.clientX - r.left - r.width / 2) / (r.width / 2)) * 2.5;
                    var rx = ((e.clientY - r.top - r.height / 2) / (r.height / 2)) * -2.5;
                    card.style.transform = 'translateY(-6px) perspective(900px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg)';
                });
                card.addEventListener('mouseleave', function () { card.style.transform = ''; });
            });
        })();
    </script>
    @include('partials.blog-share-script')
@endpush
