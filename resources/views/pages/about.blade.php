@extends('layouts.app')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('img/teams-1.jpg') }}" alt="About Bismillah Islamic Academy">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="section-title bg-white text-start pe-3" style="color:var(--gold);">About Us</h6>
                        <h1 class="display-6 mb-4">Bismillah <span style="color:var(--gold);">Islamic Academy</span> With
                            <span style="color:var(--gold);">10
                                Years</span> Of Excellence</h1>
                        <p style="color:var(--text-mid);">Bismillah Islamic Academy was founded with one mission — to
                            provide every Muslim student with authentic, accessible, and high-quality Islamic education. We
                            believe that knowledge of the Quran and Sunnah is the foundation of a righteous life.</p>
                        <p class="mb-4" style="color:var(--text-mid);">From our humble beginning with just a few students,
                            we have grown into a thriving academy with over 1,500 students, 25 qualified teachers, and a
                            curriculum that spans Quran recitation, Tajweed, Hifz, Islamic Studies, and Arabic Language.</p>
                        <div class="d-flex align-items-center mb-4 pb-2">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset('img/team-1.jpg') }}" alt="Founder"
                                style="width:50px; height:50px; border:2px solid var(--gold); object-fit:cover;">
                            <div class="ps-4">
                                <h6 style="margin:0; color:var(--navy);">Sheikh Abdullah</h6>
                                <small style="color:var(--gold); letter-spacing:1px;">Founder & Principal</small>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5"
                            style="background:var(--gold);color:#fff;border:none;">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- CTA Banner Start -->
    <div class="container-fluid cta-section py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 text-white mb-3">
                        Ready to Begin Your <span style="color:var(--gold-light);">Islamic Journey?</span>
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        Enroll today and give your child the gift of the Quran, authentic Deen, and lifelong Islamic
                        knowledge. Seats are limited — join our growing family of 1,500+ students.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">Enroll Now</a>
                    <a href="{{ route('courses') }}" class="btn btn-outline-light rounded-pill py-3 px-5 mb-3">View
                        Courses</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Banner End -->

@endsection

@push('styles')
    <style>
        /* ══════════════════════════════════════════════════
               OVERFLOW FIX — about page horizontal scroll band
               ══════════════════════════════════════════════════ */
        .page-header,
        .cta-section,
        .container-fluid {
            max-width: 100%;
        }

        /* ── Page Header ─────────────────────────────────────────── */
        .page-header {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.80), rgba(13, 27, 42, 0.80)),
                    url('{{ asset("img/about-bg.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: scroll;
            border-bottom: 3px solid var(--gold);
            min-height: 200px;
        }



        /* Page header text sizing — mobile safe */
        .page-header .display-4 {
            font-size: clamp(1.6rem, 6vw, 3rem);
            line-height: 1.2;
        }

        .page-header .breadcrumb-item+.breadcrumb-item::before {
            color: var(--gold);
        }

        /* Breadcrumb — prevent overflow on tiny screens */
        .page-header .breadcrumb {
            flex-wrap: wrap;
            row-gap: 4px;
        }

        .page-header .breadcrumb-item {
            font-size: clamp(12px, 3vw, 14px);
        }

        /* ── About section images ──────────────────────── */
        .img-border img {
            max-width: 100%;
            height: auto;
        }

        /* ── Skill bars ──────────────────────────────────────────── */
        .progress-bar {
            background: var(--gold) !important;
        }

        /* ── Testimonial top accent ──────────────────────────────── */
        .testimonial-item {
            border-top: 3px solid var(--gold);
        }

        /* ── CTA Section ─────────────────────────────────────────── */
        .cta-section {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.88), rgba(13, 27, 42, 0.88)),
                url('{{ asset("img/about-bg.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            /* scroll by default — mobile safe */
            background-attachment: scroll;
            border-top: 2px solid var(--gold);
            border-bottom: 2px solid var(--gold);
        }

        /* Desktop only — parallax */
        @media (min-width: 992px) {
            .cta-section {
                background-attachment: fixed;
                background-position: center 30%;
            }
        }

        /* CTA heading — responsive size */
        .cta-section .display-6 {
            font-size: clamp(1.4rem, 4vw, 2rem);
            line-height: 1.3;
        }

        /* CTA buttons — stack on mobile */
        @media (max-width: 575px) {
            .cta-section .col-lg-4 {
                text-align: center !important;
            }

            .cta-section .btn {
                display: block;
                width: 100%;
                max-width: 280px;
                margin: 0 auto 12px !important;
            }
        }

        .cta-section .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.35);
            color: #fff;
            transition: all 0.3s;
        }

        .cta-section .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold-light);
            color: var(--gold-light);
        }

        /* ── About section row overflow guard ───────────── */
        .container-xxl .row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        /* ── Mobile padding fix ──────────────────────────── */
        @media (max-width: 575px) {
            .container-xxl.py-5 {
                padding-top: 2.5rem !important;
                padding-bottom: 2.5rem !important;
            }

            .page-header {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }

            .page-header .container {
                padding-top: 1.5rem !important;
                padding-bottom: 1.5rem !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Skill bars animate on scroll
        var skillsDone = false;
        var skillObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting && !skillsDone) {
                    skillsDone = true;
                    setTimeout(function () {
                        document.querySelectorAll('.progress-bar').forEach(function (bar) {
                            bar.style.width = bar.getAttribute('aria-valuenow') + '%';
                            bar.style.transition = 'width 1.5s ease';
                        });
                    }, 200);
                }
            });
        }, { threshold: 0.3 });
        var featureSec = document.querySelector('.skill');
        if (featureSec) skillObs.observe(featureSec.closest('.container-xxl'));
    </script>
@endpush
