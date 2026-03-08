@extends('layouts.app')

@section('content')

    @include('partials.topbar')
    @include('partials.header')

    <!-- ===================== PAGE HEADER ===================== -->
    <div style="
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0A1520 100%);
        position: relative; padding: 90px 0; overflow: hidden;
    ">
        <div style="position:absolute; inset:0; opacity:0.05;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        "></div>
        <div
            style="position:absolute; inset:0; background: radial-gradient(ellipse at center, rgba(174,130,37,0.1) 0%, transparent 65%);">
        </div>
        <div
            style="position:absolute; left:0; top:0; bottom:0; width:4px; background: linear-gradient(180deg, transparent, var(--gold), transparent);">
        </div>
        <div class="container text-center" style="position:relative; z-index:2;">
            <div
                style="display:inline-block; font-family:'Amiri',serif; font-size:13px; color:var(--gold-light); letter-spacing:4px; text-transform:uppercase; margin-bottom:16px; padding:6px 25px; border:1px solid rgba(174,130,37,0.4);">
                ✦ Our Memories ✦</div>
            <h1
                style="font-family:'Cinzel',serif; font-size:clamp(30px,5vw,54px); font-weight:900; color:#fff; margin-bottom:18px;">
                Academy Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.6); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li class="breadcrumb-item active"
                        style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;" aria-current="page">
                        Gallery</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- ===================== FILTER TABS ===================== -->
    <section style="background: var(--white); padding: 60px 0 30px;">
        <div class="container">
            <div class="text-center mb-5 animate-on-scroll">
                <div class="section-label">Gallery</div>
                <h2 class="section-title">Moments From <span>Our Academy</span></h2>
                <div class="divider-gold"></div>
                <p style="color:var(--text-mid); font-size:14px; max-width:550px; margin:10px auto 0; line-height:1.9;">
                    Glimpses of our Quran classes, graduation ceremonies, Islamic events and the wonderful community at
                    Bismillah Islamic Academy.
                </p>
            </div>

            <!-- Filter Buttons -->
            <div style="display:flex; justify-content:center; flex-wrap:wrap; gap:10px; margin-bottom:40px;">
                @php
                    $filters = ['All', 'Quran Classes', 'Hifz Program', 'Graduation', 'Islamic Events', 'Arabic Classes'];
                @endphp
                @foreach($filters as $i => $filter)
                    <button onclick="filterGallery(this, '{{ strtolower(str_replace(' ', '-', $filter)) }}')" style="
                            font-family:'Cinzel',serif; font-size:11px; font-weight:600;
                            letter-spacing:1.5px; text-transform:uppercase;
                            padding: 9px 20px; border:1px solid var(--border);
                            background: {{ $i === 0 ? 'var(--gold)' : 'transparent' }};
                            color: {{ $i === 0 ? 'var(--white)' : 'var(--text-mid)' }};
                            cursor:pointer; transition: all 0.3s;
                        " class="filter-btn {{ $i === 0 ? 'active' : '' }}">
                        {{ $filter }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ===================== GALLERY GRID ===================== -->
    <section style="background: var(--white); padding: 0 0 90px;">
        <div class="container">
            <div class="row g-3" id="galleryGrid">

                @php
                    $gallery = [
                        ['img' => 'project-1.jpg', 'title' => 'Quran Recitation Class', 'cat' => 'quran-classes', 'tag' => 'Quran Classes'],
                        ['img' => 'project-2.jpg', 'title' => 'Hifz Students Daily Lesson', 'cat' => 'hifz-program', 'tag' => 'Hifz Program'],
                        ['img' => 'project-3.jpg', 'title' => 'Annual Graduation Ceremony', 'cat' => 'graduation', 'tag' => 'Graduation'],
                        ['img' => 'project-4.jpg', 'title' => 'Islamic Studies Workshop', 'cat' => 'islamic-events', 'tag' => 'Islamic Events'],
                        ['img' => 'project-5.jpg', 'title' => 'Arabic Language Class', 'cat' => 'arabic-classes', 'tag' => 'Arabic Classes'],
                        ['img' => 'project-6.jpg', 'title' => 'Tajweed Intensive Session', 'cat' => 'quran-classes', 'tag' => 'Quran Classes'],
                        ['img' => 'project-7.jpg', 'title' => 'Hifz Completion Certificate', 'cat' => 'graduation', 'tag' => 'Graduation'],
                        ['img' => 'project-8.jpg', 'title' => 'Eid Milad Celebration', 'cat' => 'islamic-events', 'tag' => 'Islamic Events'],
                        ['img' => 'project-9.jpg', 'title' => 'Quran Competition Winners', 'cat' => 'graduation', 'tag' => 'Graduation'],
                        ['img' => 'project-10.jpg', 'title' => 'New Student Orientation', 'cat' => 'quran-classes', 'tag' => 'Quran Classes'],
                        ['img' => 'project-1.jpg', 'title' => 'Weekend Arabic Program', 'cat' => 'arabic-classes', 'tag' => 'Arabic Classes'],
                        ['img' => 'project-2.jpg', 'title' => 'Hifz Revision Circle', 'cat' => 'hifz-program', 'tag' => 'Hifz Program'],
                    ];
                @endphp

                @foreach($gallery as $i => $item)
                    <div class="col-lg-4 col-md-6 gallery-item animate-on-scroll" data-cat="{{ $item['cat'] }}"
                        style="transition-delay: {{ ($i % 3) * 0.1 }}s">
                        <div style="position:relative; overflow:hidden; background:var(--navy);" class="gallery-card">
                            <img src="{{ asset('img/' . $item['img']) }}" alt="{{ $item['title'] }}"
                                style="width:100%; height:250px; object-fit:cover; display:block; transition: transform 0.5s, opacity 0.3s;">

                            <!-- Overlay -->
                            <div style="
                                position:absolute; inset:0;
                                background: linear-gradient(180deg, transparent 30%, rgba(13,27,42,0.95) 100%);
                                display:flex; flex-direction:column; justify-content:flex-end;
                                padding:22px; opacity:0; transition: opacity 0.4s;
                            " class="gallery-overlay">
                                <!-- Tag badge -->
                                <span style="
                                    display:inline-block; background:var(--gold);
                                    color:var(--white); font-family:'Lato',sans-serif;
                                    font-size:10px; font-weight:700; letter-spacing:1.5px;
                                    text-transform:uppercase; padding:3px 10px;
                                    margin-bottom:8px; align-self:flex-start;
                                ">{{ $item['tag'] }}</span>
                                <h5
                                    style="font-family:'Cinzel',serif; color:var(--white); font-size:14px; margin:0; line-height:1.4;">
                                    {{ $item['title'] }}</h5>
                            </div>

                            <!-- View icon -->
                            <div style="
                                position:absolute; top:50%; left:50%; transform:translate(-50%,-50%) scale(0);
                                width:52px; height:52px; background:var(--gold); border-radius:50%;
                                display:flex; align-items:center; justify-content:center;
                                color:var(--white); font-size:18px; transition: transform 0.3s;
                                z-index:2;
                            " class="gallery-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- ===================== STATS BANNER ===================== -->
    <section
        style="background:var(--navy); border-top:2px solid var(--gold); border-bottom:2px solid var(--gold); padding:60px 0;">
        <div class="container">
            <div class="row text-center">
                @php
                    $stats = [
                        ['icon' => 'fa fa-images', 'num' => '500+', 'label' => 'Photos & Videos'],
                        ['icon' => 'fas fa-graduation-cap', 'num' => '200+', 'label' => 'Graduates'],
                        ['icon' => 'fa fa-calendar', 'num' => '50+', 'label' => 'Events Held'],
                        ['icon' => 'fa fa-users', 'num' => '1500+', 'label' => 'Happy Students'],
                    ];
                @endphp
                @foreach($stats as $i => $s)
                    <div class="col-lg-3 col-6 animate-on-scroll" style="transition-delay:{{ $i * 0.1 }}s">
                        <i class="{{ $s['icon'] }}"
                            style="font-size:36px; color:var(--gold); display:block; margin-bottom:12px;"></i>
                        <div
                            style="font-family:'Cinzel',serif; font-size:40px; font-weight:900; color:var(--white); line-height:1;">
                            {{ $s['num'] }}</div>
                        <div
                            style="font-family:'Lato',sans-serif; font-size:12px; color:rgba(255,255,255,0.45); text-transform:uppercase; letter-spacing:2px; margin-top:6px;">
                            {{ $s['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    @include('partials.footer')

@endsection

@push('styles')
    <style>
        .gallery-card:hover img {
            transform: scale(1.08);
            opacity: 0.7;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-card:hover .gallery-icon {
            transform: translate(-50%, -50%) scale(1);
        }

        .filter-btn:hover {
            background: var(--gold) !important;
            color: var(--white) !important;
            border-color: var(--gold) !important;
        }

        .filter-btn.active {
            background: var(--gold) !important;
            color: var(--white) !important;
            border-color: var(--gold) !important;
        }

        .gallery-item {
            transition: all 0.4s;
        }

        .gallery-item.hidden {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function filterGallery(btn, cat) {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(function (b) {
                b.classList.remove('active');
                b.style.background = 'transparent';
                b.style.color = 'var(--text-mid)';
            });
            btn.classList.add('active');

            // Filter items
            document.querySelectorAll('.gallery-item').forEach(function (item) {
                if (cat === 'all' || item.dataset.cat === cat) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }
    </script>
@endpush
