@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}?v={{ @filemtime(public_path('css/blog.css')) }}">
@endpush

@section('title', $post->title . ' — Bismillah Islamic Academy')
@section('meta_description', Str::limit($post->excerpt ?: strip_tags($post->content), 155))
@section('og_type', 'article')
@section('og_image'){{ $post->image_url }}@endsection

@section('content')

    {{-- ARTICLE HEADER --}}
    <section class="bbl-featured bbl-featured--article">
        <div class="bbl-featured-bg">
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
            <div class="bbl-featured-scrim"></div>
        </div>

        <div class="container" style="position:relative; z-index:3;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9 col-md-11">

                    <nav aria-label="Breadcrumb" class="bbl-breadcrumb">
                        <a href="{{ route('home') }}">Home</a>
                        <span>›</span>
                        <a href="{{ route('blog') }}">Blog</a>
                        @if($post->category)
                            <span>›</span>
                            <a href="{{ route('blog', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                        @endif
                    </nav>

                    @if($post->category)
                        <div class="bbl-feat-cat-wrap">
                            <span class="bbl-feat-cat" style="background:{{ $post->category->color }};">{{ $post->category->name }}</span>
                        </div>
                    @endif
                    <h1 class="bbl-feat-title bbl-reveal" style="animation-delay:.1s;">{{ $post->title }}</h1>
                    <div class="bbl-feat-meta bbl-reveal justify-content-center" style="animation-delay:.25s;">
                        @if($post->author)
                            <span><i class="fas fa-user-circle"></i> {{ $post->author }}</span>
                        @endif
                        @if($post->published_at)
                            <span><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F j, Y') }}</span>
                        @endif
                        @if($post->read_time_label)
                            <span><i class="far fa-clock"></i> {{ $post->read_time_label }}</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ARTICLE + SIDEBAR --}}
    <section class="bbl-main">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <article class="bbl-article">
                        @if($post->excerpt)
                            <p class="bbl-article-lead">{{ $post->excerpt }}</p>
                        @endif

                        <div class="bbl-article-body">
                            {{-- Content is plain text from the admin form: keep its paragraphs and line breaks --}}
                            @foreach(preg_split('/\R{2,}/', trim((string) $post->content)) as $para)
                                @if(trim($para) !== '')
                                    <p>{!! nl2br(e(trim($para))) !!}</p>
                                @endif
                            @endforeach
                        </div>

                        <div class="bbl-article-footer">
                            <a href="{{ route('blog') }}" class="bbl-read-more">
                                <i class="fas fa-long-arrow-alt-left"></i> All articles
                            </a>
                            <button type="button" class="bbl-share-btn js-share"
                                data-url="{{ route('blog.show', $post->slug) }}" data-title="{{ $post->title }}">
                                <i class="fas fa-share-alt"></i> Share this article
                            </button>
                        </div>
                    </article>

                    @if($related->isNotEmpty())
                        <div class="bbl-related">
                            <div class="bbl-posts-heading">
                                <div>
                                    <span class="bbl-eyebrow">Keep reading</span>
                                    <h2 class="bbl-h2">Related <span>Articles</span></h2>
                                </div>
                                <div class="bbl-gold-rule"></div>
                            </div>
                            <div class="row g-4">
                                @foreach($related as $r)
                                    <div class="col-md-4">
                                        <a href="{{ route('blog.show', $r->slug) }}" class="bbl-related-card">
                                            <div class="bbl-related-thumb">
                                                <img src="{{ $r->image_url }}" alt="{{ $r->title }}" loading="lazy">
                                            </div>
                                            <div class="bbl-related-body">
                                                @if($r->published_at)
                                                    <span class="bbl-recent-date"><i class="fas fa-calendar-alt"></i> {{ $r->published_at->format('M j, Y') }}</span>
                                                @endif
                                                <h3>{{ $r->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                @include('partials.blog-sidebar', ['activeCategory' => null, 'search' => ''])

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
        })();
    </script>
    @include('partials.blog-share-script')
@endpush
