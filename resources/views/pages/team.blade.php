@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('css/team.css') }}?v={{ @filemtime(public_path('css/team.css')) }}">
@endpush

@section('title', 'Our Teachers — Bismillah Islamic Academy')
@section('meta_description', 'Meet our qualified Quran and Islamic Studies teachers: Tajweed specialists, Hifz coordinators and Arabic teachers.')

@section('content')

    <x-page-hero
        :title="section('team', 'hero', 'title', 'Our Teachers')"
        :subtitle="section('team', 'hero', 'subtitle', 'Certified scholars and experienced educators, dedicated to every student.')"
        :image="setting('img_teachers_hero') ? asset('storage/' . setting('img_teachers_hero')) : asset('storage/feature.jpg')"
        :crumbs="['Our Teachers' => null]"
    ></x-page-hero>



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width:600px;">
                <h6 class="section-title bg-white text-center pe-3" style="color:var(--gold);">{{ section('team', 'hero', 'title', 'Our Teachers') }}</h6>
                <h1 class="display-6 mb-4">{!! section('team', 'section_title', 'title', 'Meet Our <span style="color:var(--gold);">Qualified</span> & Dedicated Instructors') !!}</h1>
                <p style="color:var(--text-mid);">{{ section('team', 'section_title', 'description', 'Our teachers are certified scholars and experienced educators committed to delivering authentic Islamic education with care and excellence.') }}</p>
            </div>

            <div class="row g-4">
                @foreach($teachers as $i => $teacher)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $i * 0.1 }}s">
                        <a href="{{ route('teacher.profile', $teacher) }}" class="text-decoration-none">
                            <div class="bia-team-card">
                                <div class="bia-team-bar"></div>
                                <div class="bia-team-img-wrap">
                                    <img loading="lazy" decoding="async" src="{{ person_image($teacher->image) }}" alt="{{ $teacher->name }}" class="bia-team-img">
                                    <div class="bia-team-ring"></div>
                                </div>
                                <div class="bia-team-body">
                                    <h5 class="bia-team-name">{{ $teacher->name }}</h5>
                                    @if($teacher->role)
                                        <p class="text-muted mb-0">{{ $teacher->role }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                        {!! section('team', 'cta', 'title', 'Learn From The <span style="color:var(--gold-light);">Best Scholars</span>') !!}
                    </h1>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; max-width:580px;">
                        {{ section('team', 'cta', 'description', 'Enroll today and study under our qualified teachers — dedicated to guiding every student on the path of Quran and Sunnah.') }}
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ section('team', 'cta', 'button_url', '/contact') }}" class="btn rounded-pill py-3 px-5 me-3 mb-3"
                        style="background:var(--gold);color:#fff;border:none;">{{ section('team', 'cta', 'button_text', 'Enroll Now') }}</a>
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

            /* flex */
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
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
