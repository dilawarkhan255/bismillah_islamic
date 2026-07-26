@extends('layouts.app')

@section('title', $teacher->name . ' — Bismillah Islamic Academy')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center page-header-inner">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $teacher->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('team') }}">Our Teachers</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">{{ $teacher->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Teacher Profile Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- Profile Image -->
                <div class="col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="teacher-profile-img-wrap mx-auto">
                        <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->name }}" class="teacher-profile-img">
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">
                    <h1 class="display-6 mb-2" style="font-family:'Cinzel',serif;">{{ $teacher->name }}</h1>
                    @if($teacher->role)
                        <p class="teacher-profile-role mb-4">{{ $teacher->role }}</p>
                    @endif

                    @if($teacher->bio)
                        <div class="mb-4" style="color:var(--text-mid); font-size:16px; line-height:1.8;">
                            {!! $teacher->bio !!}
                        </div>
                    @endif

                    @if($teacher->qualifications)
                        <div class="mb-4">
                            <h5 class="mb-3" style="font-family:'Cinzel',serif; color:var(--navy);">Qualifications</h5>
                            <div style="color:var(--text-mid); font-size:16px; line-height:1.8;">
                                {!! $teacher->qualifications !!}
                            </div>
                        </div>
                    @endif

                    <!-- Contact & Social -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mt-4">
                        @if($teacher->email)
                            <a href="mailto:{{ $teacher->email }}" class="teacher-profile-social" title="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        @endif
                        @if($teacher->phone)
                            <a href="tel:{{ $teacher->phone }}" class="teacher-profile-social" title="Phone">
                                <i class="fas fa-phone"></i>
                            </a>
                        @endif
                        @if($teacher->facebook_url)
                            <a href="{{ $teacher->facebook_url }}" target="_blank" rel="noopener noreferrer" class="teacher-profile-social" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($teacher->twitter_url)
                            <a href="{{ $teacher->twitter_url }}" target="_blank" rel="noopener noreferrer" class="teacher-profile-social" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if($teacher->instagram_url)
                            <a href="{{ $teacher->instagram_url }}" target="_blank" rel="noopener noreferrer" class="teacher-profile-social" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if($teacher->linkedin_url)
                            <a href="{{ $teacher->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="teacher-profile-social" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Teacher Profile End -->


    <!-- CTA Banner Start -->
    <div class="container-fluid cta-section py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 text-white mb-3">
                        Learn From The <span style="color:var(--gold-light);">Best Scholars</span>
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        Enroll today and study under our qualified teachers — dedicated to guiding every student on the path of Quran and Sunnah.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">Enroll Now</a>
                    <a href="{{ route('courses') }}" class="btn btn-outline-light rounded-pill py-3 px-5 mb-3">View Courses</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Banner End -->

@endsection


@push('styles')
    <style>
        /* ── Page Header ─────────────────────────────────── */
        .page-header {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.82), rgba(13, 27, 42, 0.82)),
                url("{{ setting('img_home_feature') ? asset("storage/" . setting('img_home_feature')) : asset("storage/feature.jpg") }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center 40% !important;
            background-attachment: scroll !important;
            border-bottom: 3px solid var(--gold);

            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ── Teacher Profile ────────────────────────────── */
        .teacher-profile-img-wrap {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--gold);
            box-shadow: 0 0 30px rgba(174, 130, 37, 0.25);
            position: relative;
        }

        .teacher-profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .teacher-profile-role {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--gold);
            margin-bottom: 0;
        }

        .teacher-profile-social {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--off-white);
            color: var(--navy);
            font-size: 16px;
            border: 2px solid transparent;
            transition: all .3s ease;
            text-decoration: none;
        }

        .teacher-profile-social:hover {
            background: var(--gold);
            color: #fff;
            border-color: var(--gold);
            transform: translateY(-3px);
        }

        @media (max-width: 991.98px) {
            .teacher-profile-img-wrap {
                width: 220px;
                height: 220px;
            }
        }

        /* ── CTA ─────────────────────────────────────────── */
        .cta-section {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.90), rgba(13, 27, 42, 0.90)),
                url("{{ setting('img_home_feature') ? asset("storage/" . setting('img_home_feature')) : asset("storage/feature.jpg") }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: scroll;
            border-top: 2px solid var(--gold);
            border-bottom: 2px solid var(--gold);
        }

        @media (min-width: 992px) {
            .cta-section {
                background-attachment: fixed;
                background-position: center center;
            }
        }

        .cta-section .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.35);
            color: #fff;
            transition: all .3s;
        }

        .cta-section .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold-light);
            color: var(--gold-light);
        }
    </style>
@endpush
