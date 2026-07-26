@extends('layouts.app')

@section('content')

    <!-- PAGE HEADER -->
    <div class="gallery-hero">
        <div class="gallery-hero-bg">
            <img src="{{ setting('img_gallery_hero') ? asset('storage/' . setting('img_gallery_hero')) : asset('storage/gallery-hero.jpg') }}" alt="Gallery Hero Background">
        </div>
        <div class="gallery-hero-pattern"></div>
        <div class="gallery-hero-glow"></div>
        <div class="gallery-hero-line-left"></div>
        <div class="gallery-hero-line-right"></div>
        <div class="gallery-hero-line-bottom"></div>

        <div class="g-particles">
            @for($p = 1; $p <= 10; $p++)
                <div class="g-particle"
                    style="left:{{ rand(5, 95) }}%; animation-delay:{{ $p * 0.5 }}s; animation-duration:{{ 4 + ($p % 3) }}s;">
                </div>
            @endfor
        </div>

        <div class="container text-center" style="position:relative; z-index:5;">
            <div class="g-hero-arabic g-reveal" style="animation-delay:0s;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <div class="g-hero-tag g-reveal" style="animation-delay:0.15s;">✦ Bismillah Islamic Academy ✦</div>
            <h1 class="g-hero-title g-reveal" style="animation-delay:0.3s;">
                {!! section('gallery', 'hero', 'title', 'Academy <span style="color:var(--gold-light);">Gallery</span>') !!}
            </h1>
            <p class="g-hero-sub g-reveal" style="animation-delay:0.45s;">
                {{ section('gallery', 'hero', 'subtitle', 'Cherished moments from our classes, ceremonies, and community events.') }}
            </p>
            <nav aria-label="breadcrumb" class="g-reveal" style="animation-delay:0.6s;">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.5); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li style="color:rgba(255,255,255,0.3); padding:0 8px; font-size:13px;">›</li>
                    <li style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- MASONRY GALLERY -->
    <section class="g-grid-section">
        <div class="container">

            <div class="text-center mb-5 g-scroll" data-dir="up">
                <span class="g-label-tag">Photo Gallery</span>
                <h2 class="g-section-h2" style="margin-top:12px; margin-bottom:14px;">{{ section('gallery', 'section_title', 'title', 'Glimpses of Our Academy') }}</h2>
                <div style="width:50px; height:2px; background:var(--gold); margin:0 auto;"></div>
            </div>

            @if($gallery->count())
                <div class="g-masonry" id="galleryGrid">
                    @foreach($gallery as $i => $item)
                        <div class="g-item g-scroll" data-dir="up" style="transition-delay:{{ ($i % 4) * 0.09 }}s;">
                            <div class="g-card">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy">
                                <div class="g-card-overlay">
                                    <a href="{{ asset('storage/' . $item->image) }}"
                                       class="g-card-zoom"
                                       data-lightbox="gallery"
                                       data-title="{{ $item->title }}"
                                       aria-label="View image">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-images" style="font-size:48px; color:var(--gold); opacity:0.3;"></i>
                    <p style="color:var(--text-muted); margin-top:16px; font-size:15px;">Gallery coming soon. Check back later!</p>
                </div>
            @endif

        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="g-cta-section g-scroll mb-5" data-dir="up">
        <div class="g-cta-pattern"></div>
        <div class="g-cta-glow"></div>
        <div class="container text-center" style="position:relative; z-index:2;">
            <div class="g-cta-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <h2 class="g-cta-title">
                {!! section('gallery', 'cta', 'title', 'Be Part Of Our <span style="color:var(--gold-light);">Growing Community</span>') !!}
            </h2>
            <p class="g-cta-desc">
                {{ section('gallery', 'cta', 'description', 'Join Bismillah Islamic Academy and create your own beautiful memories on the path of Quranic knowledge.') }}
            </p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="{{ section('gallery', 'cta', 'button_url', '/free-trial') }}" class="g-btn-gold">{{ section('gallery', 'cta', 'button_text', 'Enroll Now') }}</a>
                <a href="{{ route('contact') }}" class="g-btn-outline">Contact Us</a>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script>
        (function () {
            var els = document.querySelectorAll('.g-scroll');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
                    });
                }, { threshold: 0.1 });
                els.forEach(function (el) { io.observe(el); });
            } else {
                els.forEach(function (el) { el.classList.add('visible'); });
            }

            document.querySelectorAll('.g-card').forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var r = card.getBoundingClientRect();
                    var rx = ((e.clientY - r.top - r.height / 2) / (r.height / 2)) * -3;
                    var ry = ((e.clientX - r.left - r.width / 2) / (r.width / 2)) * 3;
                    card.style.transform = 'perspective(700px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg) scale(1.02)';
                });
                card.addEventListener('mouseleave', function () { card.style.transform = ''; });
            });
        })();
    </script>
@endpush
