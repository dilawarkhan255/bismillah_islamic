@extends('layouts.app')

@section('title', 'Articles & Blog — Bismillah Islamic Academy')

@section('content')




    {{-- FEATURED HERO --}}
    @if($featured)
    <section class="bbl-featured">
        <div class="bbl-featured-bg">
            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}">
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

                    <div class="bbl-feat-cat-wrap">
                        <span class="bbl-feat-cat" style="background:{{ $featured->category->color }};">{{ $featured->category->name }}</span>
                    </div>
                    <h1 class="bbl-feat-title bbl-reveal" style="animation-delay:.1s;">{{ $featured->title }}</h1>
                    <div class="bbl-feat-meta bbl-reveal justify-content-center" style="animation-delay:.25s;">
                        <span><i class="fas fa-user-circle"></i> {{ $featured->author }}</span>
                        <span><i class="fas fa-calendar-alt"></i> {{ $featured->published_at->format('F j, Y') }}</span>
                        <span><i class="far fa-clock"></i> {{ $featured->read_time }}</span>
                    </div>
                    <p class="bbl-feat-excerpt bbl-reveal" style="animation-delay:.4s;">
                        {{ $featured->excerpt }}
                    </p>
                    <div class="bbl-feat-btn-wrap bbl-reveal" style="animation-delay:.55s;">
                        <a href="#" class="bbl-feat-btn">
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
                            <span class="bbl-eyebrow">Islamic Knowledge</span>
                            <h2 class="bbl-h2">Latest <span>Articles</span></h2>
                        </div>
                        <div class="bbl-gold-rule"></div>
                    </div>

                    @foreach($posts as $pi => $post)
                        <article class="bbl-card bbl-sr" data-dir="up" style="transition-delay:{{ ($pi % 3) * .1 }}s;">

                            {{-- Image --}}
                            <div class="bbl-card-thumb">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                <div class="bbl-card-thumb-overlay"></div>
                                <span class="bbl-card-badge"
                                    style="background:{{ $post->category->color }};">{{ $post->category->name }}</span>
                                <span class="bbl-card-read-badge">{{ $post->read_time }}</span>
                            </div>

                            {{-- Body --}}
                            <div class="bbl-card-body">
                                <div class="bbl-card-meta">
                                    <span><i class="fas fa-user-circle"></i> {{ $post->author }}</span>
                                    <span><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F j, Y') }}</span>
                                </div>
                                <h3 class="bbl-card-title">
                                    <a href="#" class="bbl-card-link">{{ $post->title }}</a>
                                </h3>
                                <p class="bbl-card-excerpt">{{ $post->excerpt }}</p>
                                <div class="bbl-card-footer">
                                    <a href="#" class="bbl-read-more">
                                        Read Article <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                    <div class="bbl-card-icons">
                                        <button class="bbl-icon-btn" title="Bookmark"><i class="far fa-bookmark"></i></button>
                                        <button class="bbl-icon-btn" title="Share"><i class="fas fa-share-alt"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="bbl-card-number">{{ str_pad($pi + 1, 2, '0', STR_PAD_LEFT) }}</div>

                        </article>
                    @endforeach

                    <nav class="bbl-pagination bbl-sr d-flex justify-content-center gap-2 w-100" data-dir="up">
                        <a href="#" class="bbl-pg bbl-pg--active">01</a>
                        <a href="#" class="bbl-pg">02</a>
                        <a href="#" class="bbl-pg">03</a>
                        <span class="bbl-pg-dots">···</span>
                        <a href="#" class="bbl-pg"><i class="fas fa-chevron-right"></i></a>
                    </nav>

                </div>

                {{-- SIDEBAR --}}
                <aside class="col-lg-4 bbl-sr" data-dir="right">

                    <div class="bbl-widget bbl-widget--search">
                        <div class="bbl-widget-hd"><i class="fas fa-search"></i> Search</div>
                        <div class="bbl-widget-bd">
                            <div class="bbl-search">
                                <input type="text" placeholder="Search articles…">
                                <button><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="bbl-verse">
                        <div class="bbl-verse-bg"></div>
                        <div class="bbl-verse-inner">
                            <div class="bbl-verse-arabic">اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ</div>
                            <div class="bbl-verse-line"></div>
                            <p class="bbl-verse-trans">"Read in the name of your Lord who created"</p>
                            <span class="bbl-verse-ref">Surah Al-Alaq — 96:1</span>
                        </div>
                    </div>

                    <div class="bbl-widget">
                        <div class="bbl-widget-hd"><i class="fas fa-layer-group"></i> Categories</div>
                        <div class="bbl-widget-bd bbl-widget-bd--flush">
                            @foreach($categories as $cat)
                                <a href="#" class="bbl-cat">
                                    <span class="bbl-cat-dot" style="background:{{ $cat->color }};"></span>
                                    <span class="bbl-cat-name">{{ $cat->name }}</span>
                                    <span class="bbl-cat-count"
                                        style="color:{{ $cat->color }}; border-color:{{ $cat->color }}33;">{{ $cat->posts_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="bbl-widget">
                        <div class="bbl-widget-hd"><i class="fas fa-history"></i> Recent Articles</div>
                        <div class="bbl-widget-bd bbl-widget-bd--flush">
                            @foreach($recent as $ri => $r)
                                <a href="#" class="bbl-recent {{ $ri < count($recent) - 1 ? 'bbl-recent--sep' : '' }}">
                                    <div class="bbl-recent-thumb">
                                        <img src="{{ asset('storage/' . $r->image) }}" alt="">
                                        <div class="bbl-recent-overlay"></div>
                                    </div>
                                    <div class="bbl-recent-text">
                                        <p class="bbl-recent-title">{{ $r->title }}</p>
                                        <span class="bbl-recent-date"><i class="fas fa-calendar-alt"></i>
                                            {{ $r->published_at->format('M j, Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="bbl-enroll-cta">
                        <div class="bbl-enroll-bg"></div>
                        <div class="bbl-enroll-inner">
                            <div class="bbl-enroll-icon"><i class="fas fa-quran"></i></div>
                            <h5 class="bbl-enroll-title">Begin Your Journey</h5>
                            <p class="bbl-enroll-text">Join Bismillah Islamic Academy and walk the path of Quranic
                                excellence today.</p>
                            <a href="{{ route('free_trial') }}" class="bbl-enroll-btn">Enroll Now</a>
                        </div>
                    </div>

                </aside>
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
@endpush
