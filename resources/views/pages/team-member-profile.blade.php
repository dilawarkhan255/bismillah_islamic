@extends('layouts.app')

@section('title', $member->name . ' — Bismillah Islamic Academy')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center page-header-inner">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $member->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('our-team') }}">Our Team</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:var(--gold-light);">{{ $member->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Profile Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-start">

                <!-- Left: Image & Social -->
                <div class="col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tmp-profile-wrap mb-4">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="tmp-profile-img">
                        @else
                            <div class="tmp-profile-img tmp-profile-placeholder">
                                <i class="fas fa-user" style="font-size:64px;color:var(--gold);"></i>
                            </div>
                        @endif
                    </div>

                    @if($member->role)
                        <h4 style="font-family:'Cinzel',serif;color:var(--navy);font-weight:800;">{{ $member->name }}</h4>
                        <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:2.5px;color:var(--gold);margin-bottom:20px;">{{ $member->role }}</p>
                    @endif

                    @if($member->department)
                        <div style="margin-bottom:16px;">
                            <span style="background:rgba(174,130,37,.08);border:1px solid rgba(174,130,37,.25);padding:5px 14px;border-radius:50px;font-size:11px;font-weight:700;color:var(--gold);letter-spacing:1px;text-transform:uppercase;">
                                {{ $member->department }}
                            </span>
                        </div>
                    @endif

                    <!-- Social Links -->
                    <div class="tmp-socials mb-3">
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

                    @if($member->email || $member->phone)
                        <div style="background:#f8f6f0;border:1px solid rgba(174,130,37,.15);padding:16px;border-radius:6px;margin-top:16px;">
                            @if($member->email)
                                <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                                    <i class="far fa-envelope" style="color:var(--gold);font-size:14px;width:20px;text-align:center;"></i>
                                    <a href="mailto:{{ $member->email }}" style="color:var(--navy);font-size:13px;text-decoration:none;">{{ $member->email }}</a>
                                </div>
                            @endif
                            @if($member->phone)
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <i class="fas fa-phone" style="color:var(--gold);font-size:14px;width:20px;text-align:center;"></i>
                                    <a href="tel:{{ $member->phone }}" style="color:var(--navy);font-size:13px;text-decoration:none;">{{ $member->phone }}</a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Right: Bio & Details -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">

                    @if($member->bio)
                        <div class="mb-4">
                            <h5 style="font-family:'Cinzel',serif;color:var(--navy);font-weight:800;margin-bottom:12px;">
                                <i class="fas fa-book-open" style="color:var(--gold);margin-right:8px;"></i> About
                            </h5>
                            <div style="color:#555;font-size:15px;line-height:1.9;">
                                {!! nl2br(e($member->bio)) !!}
                            </div>
                        </div>
                    @endif

                    @if($member->qualifications)
                        <div class="mb-4">
                            <h5 style="font-family:'Cinzel',serif;color:var(--navy);font-weight:800;margin-bottom:12px;">
                                <i class="fas fa-graduation-cap" style="color:var(--gold);margin-right:8px;"></i> Qualifications
                            </h5>
                            <div style="color:#555;font-size:15px;line-height:1.9;">
                                {!! nl2br(e($member->qualifications)) !!}
                            </div>
                        </div>
                    @endif

                    @if($member->experience)
                        <div class="mb-4">
                            <h5 style="font-family:'Cinzel',serif;color:var(--navy);font-weight:800;margin-bottom:12px;">
                                <i class="fas fa-briefcase" style="color:var(--gold);margin-right:8px;"></i> Experience
                            </h5>
                            <div style="color:#555;font-size:15px;line-height:1.9;">
                                {!! nl2br(e($member->experience)) !!}
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- Profile End -->


    <!-- CTA Banner Start -->
    <div class="container-fluid cta-section py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row align-items-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 text-white mb-3">
                        Learn From The <span style="color:var(--gold-light);">Best Scholars</span>
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        Enroll today and study under our qualified team — dedicated to guiding every student on the path of Quran and Sunnah.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">Enroll Now</a>
                    <a href="{{ route('our-team') }}" class="btn btn-outline-light rounded-pill py-3 px-5 mb-3">View All Team</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Banner End -->

@endsection

@push('styles')
<style>
    .page-header {
        background-image:
            linear-gradient(rgba(13, 27, 42, 0.82), rgba(13, 27, 42, 0.82)),
            url("{{ setting('img_home_feature') ? asset("storage/" . setting('img_home_feature')) : asset("storage/feature.jpg") }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center 40% !important;
        background-attachment: scroll !important;
        border-bottom: 3px solid var(--gold);
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tmp-profile-wrap {
        display: inline-block;
        position: relative;
    }
    .tmp-profile-img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(174, 130, 37, 0.30);
        transition: border-color .35s;
    }
    .tmp-profile-img:hover {
        border-color: var(--gold);
    }
    .tmp-profile-placeholder {
        display: grid;
        place-items: center;
        background: #f5f5f0;
    }

    .tmp-socials {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
    }
    .tmp-socials a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f5f5f0;
        color: var(--navy);
        font-size: 14px;
        border: 1px solid transparent;
        transition: all .3s ease;
        text-decoration: none;
    }
    .tmp-socials a:hover {
        background: var(--gold);
        color: #fff;
        border-color: var(--gold);
        transform: translateY(-3px);
    }

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
        .cta-section { background-attachment: fixed; }
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
