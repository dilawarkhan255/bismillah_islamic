@extends('layouts.app')

@section('content')

    @php
        $gallery = [
            ['img' => 'project-1.jpg', 'title' => 'Quran Recitation Class'],
            ['img' => 'project-2.jpg', 'title' => 'Hifz Students Daily Lesson'],
            ['img' => 'project-3.jpg', 'title' => 'Annual Graduation Ceremony'],
            ['img' => 'project-4.jpg', 'title' => 'Islamic Studies Workshop'],
            ['img' => 'project-5.jpg', 'title' => 'Arabic Language Class'],
            ['img' => 'project-6.jpg', 'title' => 'Tajweed Intensive Session'],
        ];
    @endphp

    <!-- PAGE HEADER -->
    <div class="gallery-hero">
        <div class="gallery-hero-bg">
            <img src="{{ asset('img/gallery-hero.jpg') }}" alt="Gallery Hero Background">
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
            <div class="g-hero-arabic  g-reveal" style="animation-delay:0s;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <div class="g-hero-tag    g-reveal" style="animation-delay:0.15s;">✦ Bismillah Islamic Academy ✦</div>
            <h1 class="g-hero-title  g-reveal" style="animation-delay:0.3s;">
                Academy <span style="color:var(--gold-light);">Gallery</span>
            </h1>
            <p class="g-hero-sub    g-reveal" style="animation-delay:0.45s;">
                Cherished moments from our classes, ceremonies, and community events
            </p>
            <nav aria-label="breadcrumb" class="g-reveal" style="animation-delay:0.6s;">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.5); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
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
                <h2 class="g-section-h2" style="margin-top:12px; margin-bottom:14px;">Glimpses of Our Academy</h2>
                <div style="width:50px; height:2px; background:var(--gold); margin:0 auto;"></div>
            </div>

            <div class="g-masonry" id="galleryGrid">
                @foreach($gallery as $i => $item)
                    <div class="g-item g-scroll" data-dir="up" style="transition-delay:{{ ($i % 4) * 0.09 }}s;">
                        <div class="g-card">
                            <img src="{{ asset('img/' . $item['img']) }}" alt="{{ $item['title'] }}" loading="lazy">

                            {{-- ✅ Dark overlay only — no text, just eye icon top right --}}
                            <div class="g-card-overlay">
                                <a href="{{ asset('img/' . $item['img']) }}"
                                   class="g-card-zoom"
                                   data-lightbox="gallery"
                                   data-title="{{ $item['title'] }}"
                                   aria-label="View image">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="g-cta-section g-scroll" data-dir="up">
        <div class="g-cta-pattern"></div>
        <div class="g-cta-glow"></div>
        <div class="container text-center" style="position:relative; z-index:2;">
            <div class="g-cta-arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <h2 class="g-cta-title">
                Be Part Of Our <span style="color:var(--gold-light);">Growing Community</span>
            </h2>
            <p class="g-cta-desc">
                Join Bismillah Islamic Academy and create your own beautiful memories on the path of Quranic knowledge.
            </p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="{{ ('enroll') }}" class="g-btn-gold">Enroll Now</a>
                <a href="{{ route('contact') }}" class="g-btn-outline">Contact Us</a>
            </div>
        </div>
    </section>

@endsection


@push('styles')
    <style>
        /* ── HERO ─────────────────────────────────────────────────── */
        .gallery-hero {
            position: relative;
            padding: 110px 0 90px;
            overflow: hidden;
            isolation: isolate;
            background: var(--navy);
        }
        .gallery-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        .gallery-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .gallery-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                rgba(13,27,42,0.96) 0%,
                rgba(13,27,42,0.80) 55%,
                rgba(10,21,32,0.88) 100%);
        }
        .gallery-hero-pattern {
            position: absolute; inset: 0; z-index: 1; opacity: .05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3Cpath d=%22M40 10L70 40L40 70L10 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }
        .gallery-hero-glow {
            position: absolute; inset: 0; z-index: 2;
            background: radial-gradient(ellipse at center, rgba(174,130,37,.12) 0%, transparent 65%);
        }
        .gallery-hero-line-left,
        .gallery-hero-line-right {
            position: absolute; top: 0; bottom: 0; width: 4px; z-index: 3;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
        }
        .gallery-hero-line-left  { left: 0; }
        .gallery-hero-line-right { right: 0; }
        .gallery-hero-line-bottom {
            position: absolute; bottom: 0; left: 0; right: 0; height: 1px; z-index: 3;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }
        .g-hero-arabic {
            font-family: 'Amiri', serif; font-size: 28px;
            color: rgba(174,130,37,.7); margin-bottom: 16px; letter-spacing: 2px;
        }
        .g-hero-tag {
            display: inline-block; font-family: 'Amiri', serif; font-size: 12px;
            color: var(--gold-light); letter-spacing: 5px; text-transform: uppercase;
            margin-bottom: 20px; padding: 7px 28px;
            border: 1px solid rgba(174,130,37,.45);
        }
        .g-hero-title {
            font-family: 'Cinzel', serif; font-size: clamp(32px,5vw,58px);
            font-weight: 900; color: #fff; margin-bottom: 16px; line-height: 1.1;
        }
        .g-hero-sub {
            color: rgba(255,255,255,.55); font-family: 'Lato', sans-serif;
            font-size: 15px; max-width: 500px; margin: 0 auto 24px; line-height: 1.8;
        }

        /* ── PARTICLES ────────────────────────────────────────────── */
        .g-particles { position: absolute; inset: 0; pointer-events: none; overflow: hidden; z-index: 4; }
        .g-particle {
            position: absolute; width: 4px; height: 4px;
            background: var(--gold); border-radius: 50%; opacity: 0; bottom: -10px;
            animation: gFloatUp linear infinite;
        }
        @keyframes gFloatUp {
            0%   { opacity: 0; transform: translateY(0) scale(1); }
            10%  { opacity: .6; }
            90%  { opacity: .15; }
            100% { opacity: 0; transform: translateY(-130px) scale(.3); }
        }

        /* ── REVEAL ───────────────────────────────────────────────── */
        .g-reveal {
            opacity: 0; transform: translateY(28px);
            animation: gRevUp .7s cubic-bezier(.25,.46,.45,.94) forwards;
        }
        @keyframes gRevUp { to { opacity: 1; transform: translateY(0); } }

        .g-scroll { opacity: 0; transition: opacity .75s ease, transform .75s cubic-bezier(.25,.46,.45,.94); }
        .g-scroll[data-dir="up"]    { transform: translateY(40px); }
        .g-scroll[data-dir="left"]  { transform: translateX(-45px); }
        .g-scroll[data-dir="right"] { transform: translateX(45px); }
        .g-scroll.visible { opacity: 1 !important; transform: translate(0) !important; }

        /* ── COMMON ───────────────────────────────────────────────── */
        .g-label-tag {
            font-family: 'Cinzel', serif; font-size: 11px;
            letter-spacing: 3px; text-transform: uppercase; color: var(--gold); display: block;
        }
        .g-section-h2 {
            font-family: 'Cinzel', serif; font-size: clamp(24px,3vw,38px);
            color: var(--navy); font-weight: 800; line-height: 1.25;
        }

        /* ── BUTTONS ──────────────────────────────────────────────── */
        .g-btn-gold {
            display: inline-block; background: var(--gold); color: var(--white);
            font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px;
            letter-spacing: 2px; text-transform: uppercase; padding: 14px 36px;
            text-decoration: none; border: 2px solid var(--gold); transition: all .3s;
        }
        .g-btn-gold:hover { background: transparent; color: var(--gold); }
        .g-btn-outline {
            display: inline-block; background: transparent; color: rgba(255,255,255,.8);
            font-family: 'Cinzel', serif; font-weight: 700; font-size: 12px;
            letter-spacing: 2px; text-transform: uppercase; padding: 14px 36px;
            text-decoration: none; border: 2px solid rgba(255,255,255,.25); transition: all .3s;
        }
        .g-btn-outline:hover { border-color: var(--gold); color: var(--gold); }

        /* ── GALLERY GRID ─────────────────────────────────────────── */
        .g-grid-section { background: var(--white); padding: 80px 0 100px; }
        .g-masonry { columns: 3; column-gap: 16px; }
        @media (max-width: 991px) { .g-masonry { columns: 2; } }
        @media (max-width: 575px) { .g-masonry { columns: 1; } }
        .g-item { break-inside: avoid; margin-bottom: 16px; }

        .g-card {
            position: relative; overflow: hidden; display: block;
            background: var(--navy); cursor: pointer;
        }
        .g-card img {
            width: 100%; display: block;
            transition: transform .55s ease, filter .4s ease;
            filter: brightness(0.95);
        }
        .g-card:hover img {
            transform: scale(1.07);
            filter: brightness(0.55);
        }

        /* ✅ Overlay — dark bg only, no text */
        .g-card-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13, 27, 42, 0.0);
            transition: background .4s ease;
            pointer-events: none;
        }
        .g-card:hover .g-card-overlay {
            background: rgba(13, 27, 42, 0.45);
        }

        /* ✅ Eye icon — always top right, shows on hover */
        .g-card-zoom {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 42px;
            height: 42px;
            background: var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 15px;
            text-decoration: none;
            opacity: 0;
            transform: scale(0.6);
            transition: opacity .3s ease, transform .35s cubic-bezier(.34,1.56,.64,1);
            z-index: 10;
            pointer-events: all;
        }
        .g-card:hover .g-card-zoom {
            opacity: 1;
            transform: scale(1);
        }

        .g-card::before {
            content: ''; position: absolute; inset: 0;
            border: 2px solid var(--gold); opacity: 0;
            transition: opacity .35s; z-index: 2; pointer-events: none;
        }
        .g-card:hover::before { opacity: 1; }

        /* ── CTA ──────────────────────────────────────────────────── */
        .g-cta-section {
            background: var(--navy); padding: 85px 0;
            position: relative; overflow: hidden;
            border-top: 2px solid var(--gold);
        }
        .g-cta-pattern {
            position: absolute; inset: 0; opacity: .04;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }
        .g-cta-glow {
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at center, rgba(174,130,37,.08) 0%, transparent 65%);
        }
        .g-cta-arabic { font-family: 'Amiri', serif; font-size: 22px; color: var(--gold-light); margin-bottom: 12px; opacity: .8; }
        .g-cta-title { font-family: 'Cinzel', serif; font-size: clamp(22px,3vw,38px); font-weight: 800; color: #fff; margin-bottom: 14px; line-height: 1.2; }
        .g-cta-desc { color: rgba(255,255,255,.55); font-size: 15px; max-width: 520px; margin: 0 auto 30px; line-height: 1.85; }
    </style>
@endpush


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
