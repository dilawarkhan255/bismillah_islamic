@extends('layouts.app')

@section('title', 'Our Team — Bismillah Islamic Academy')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center page-header-inner">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ section('our-team', 'hero', 'title', 'Meet Our Dedicated Team') }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">Our Team</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width:600px;">
                <h6 class="section-title bg-white text-center pe-3" style="color:var(--gold);">{{ section('our-team', 'hero', 'title', 'Our Team') }}</h6>
                <h1 class="display-6 mb-4">{!! section('our-team', 'section_title', 'title', 'Meet Our <span style="color:var(--gold);">Dedicated</span> Team') !!}</h1>
                <p style="color:var(--text-mid);">{{ section('our-team', 'section_title', 'description', 'Our team of qualified scholars and experienced educators is committed to delivering authentic Islamic education with care, excellence, and devotion.') }}</p>
            </div>

            <div class="row g-4">
                @foreach($members as $i => $member)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $i * 0.1 }}s">
                        <div class="ot-card">
                            <div class="ot-bar"></div>
                            <a href="{{ route('team-member.profile', $member) }}" class="text-decoration-none">
                                <div class="ot-img-wrap">
                                    @if($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="ot-img">
                                    @else
                                        <div class="ot-img ot-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                    <div class="ot-ring"></div>
                                </div>
                            </a>
                            <div class="ot-body">
                                <a href="{{ route('team-member.profile', $member) }}" class="text-decoration-none">
                                    <h5 class="ot-name">{{ $member->name }}</h5>
                                </a>
                                @if($member->role)
                                    <p class="ot-role">{{ $member->role }}</p>
                                @endif
                                @if($member->short_bio)
                                    <p class="ot-bio">{{ Str::limit(strip_tags($member->short_bio), 120) }}</p>
                                @elseif($member->bio)
                                    <p class="ot-bio">{{ Str::limit(strip_tags($member->bio), 120) }}</p>
                                @endif
                                <div class="ot-socials">
                                    @if($member->email)
                                        <a href="mailto:{{ $member->email }}" title="Email"><i class="fas fa-envelope"></i></a>
                                    @endif
                                    @if($member->phone)
                                        <a href="tel:{{ $member->phone }}" title="Phone"><i class="fas fa-phone"></i></a>
                                    @endif
                                    @if($member->facebook_url)
                                        <a href="{{ $member->facebook_url }}" target="_blank" rel="noopener" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if($member->twitter_url)
                                        <a href="{{ $member->twitter_url }}" target="_blank" rel="noopener" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if($member->instagram_url)
                                        <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener" title="Instagram"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                </div>
                                <a href="{{ route('team-member.profile', $member) }}" class="ot-view-btn">
                                    View Profile <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($members->isEmpty())
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-people" style="font-size:48px;color:var(--gold);opacity:0.3;"></i>
                        <p class="mt-3" style="color:var(--text-mid);">Team members coming soon. Stay tuned!</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <!-- Team End -->


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
    <link rel="stylesheet" href="{{ asset('css/our-team.css') }}">
    <style>
        .page-header {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.82), rgba(13, 27, 42, 0.82)),
                url("{{ setting('img_home_feature') ? asset("storage/" . setting('img_home_feature')) : asset("img/feature.jpg") }}");
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

        .cta-section {
            background-image:
                linear-gradient(rgba(13, 27, 42, 0.90), rgba(13, 27, 42, 0.90)),
                url("{{ setting('img_home_feature') ? asset("storage/" . setting('img_home_feature')) : asset("img/feature.jpg") }}");
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
