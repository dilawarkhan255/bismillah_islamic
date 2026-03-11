@extends('layouts.app')

@section('title', 'Articles & Blog — Bismillah Islamic Academy')

@section('content')

    @php
        $posts = [
            [
                'img' => 'project-1.jpg',
                'cat' => 'Quran Learning',
                'cat_color' => '#2e7d32',
                'title' => '10 Proven Tips To Memorize The Quran Faster',
                'excerpt' => 'Memorizing the Quran is one of the most noble acts a Muslim can pursue. We share 10 proven techniques used by our Hifz teachers to help students memorize effectively and retain what they learn for a lifetime.',
                'author' => 'Sheikh Abdullah',
                'date' => 'March 5, 2025',
                'read' => '5 min read',
            ],
            [
                'img' => 'project-2.jpg',
                'cat' => 'Tajweed',
                'cat_color' => '#b8860b',
                'title' => 'The Importance of Tajweed: Why Correct Recitation Matters',
                'excerpt' => 'Tajweed is not just about beautiful recitation — it is an obligation upon every Muslim. Learn about the rules of Tajweed, why scholars consider it Fard Kifayah, and how to start learning today.',
                'author' => 'Ustaz Ibrahim',
                'date' => 'February 20, 2025',
                'read' => '7 min read',
            ],
            [
                'img' => 'project-3.jpg',
                'cat' => 'Islamic Parenting',
                'cat_color' => '#1565c0',
                'title' => 'How To Raise Quran-Loving Children in a Modern World',
                'excerpt' => 'In an age of screens and distractions, raising children with a love for the Quran requires intention and strategy. Ustaza Fatima shares practical advice for parents on building a Quran-centered home.',
                'author' => 'Ustaza Fatima',
                'date' => 'February 8, 2025',
                'read' => '6 min read',
            ],
            [
                'img' => 'project-4.jpg',
                'cat' => 'Arabic Language',
                'cat_color' => '#00695c',
                'title' => 'Why Every Muslim Should Learn Arabic — Even the Basics',
                'excerpt' => 'Understanding Arabic — even at a basic level — transforms your relationship with the Quran, Salah, and Duas. We explain the first steps to start learning Quranic Arabic from scratch.',
                'author' => 'Sheikh Abdullah',
                'date' => 'January 25, 2025',
                'read' => '4 min read',
            ],
            [
                'img' => 'project-5.jpg',
                'cat' => 'Ramadan Guide',
                'cat_color' => '#6a1b9a',
                'title' => 'A Complete Ramadan Quran Guide: Finish The Quran This Month',
                'excerpt' => 'Ramadan is the month of the Quran. With the right daily plan, anyone can complete the entire Quran during Ramadan. Get our free schedule and practical tips inside.',
                'author' => 'Ustaz Ibrahim',
                'date' => 'January 10, 2025',
                'read' => '8 min read',
            ],
            [
                'img' => 'project-6.jpg',
                'cat' => 'Islamic Studies',
                'cat_color' => '#c62828',
                'title' => 'Understanding Aqeedah: The Foundation of Islamic Belief',
                'excerpt' => 'A correct understanding of Aqeedah — Islamic creed — is the foundation upon which all worship is built. This article introduces the key pillars of Islamic belief every Muslim must know.',
                'author' => 'Sheikh Abdullah',
                'date' => 'December 18, 2024',
                'read' => '9 min read',
            ],
        ];

        $categories = [
            ['name' => 'Quran Learning', 'count' => 12, 'color' => '#2e7d32'],
            ['name' => 'Tajweed', 'count' => 8, 'color' => '#b8860b'],
            ['name' => 'Islamic Parenting', 'count' => 6, 'color' => '#1565c0'],
            ['name' => 'Arabic Language', 'count' => 5, 'color' => '#00695c'],
            ['name' => 'Ramadan Guide', 'count' => 4, 'color' => '#6a1b9a'],
            ['name' => 'Islamic Studies', 'count' => 10, 'color' => '#c62828'],
        ];

        $recent = [
            ['img' => 'project-1.jpg', 'title' => '10 Tips To Memorize The Quran Faster', 'date' => 'Mar 5, 2025'],
            ['img' => 'project-2.jpg', 'title' => 'Why Tajweed Is Obligatory For Every Muslim', 'date' => 'Feb 20, 2025'],
            ['img' => 'project-3.jpg', 'title' => 'Raising Quran-Loving Children', 'date' => 'Feb 8, 2025'],
        ];
    @endphp


    {{-- ═══════════════════════════════════════════════
    FEATURED HERO — full-bleed first article
    ═══════════════════════════════════════════════ --}}
    <section class="bbl-featured">
        <div class="bbl-featured-bg">
            <img src="{{ asset('img/project-1.jpg') }}" alt="Featured Article">
            <div class="bbl-featured-scrim"></div>
        </div>

        <div class="container" style="position:relative; z-index:3;">
            <div class="row">
                <div class="col-lg-7">
                    <!-- breadcrumb -->
                    <nav style="margin-bottom:22px;">
                        <ol class="breadcrumb mb-0" style="background:transparent; padding:0;">
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

                    <span class="bbl-feat-cat" style="background:#2e7d32;">Quran Learning</span>

                    <h1 class="bbl-feat-title bbl-reveal" style="animation-delay:.1s;">
                        10 Proven Tips To Memorize<br>The Quran Faster
                    </h1>

                    <div class="bbl-feat-meta bbl-reveal" style="animation-delay:.25s;">
                        <span><i class="fas fa-user-circle"></i> Sheikh Abdullah</span>
                        <span><i class="fas fa-calendar-alt"></i> March 5, 2025</span>
                        <span><i class="far fa-clock"></i> 5 min read</span>
                    </div>

                    <p class="bbl-feat-excerpt bbl-reveal" style="animation-delay:.4s;">
                        Memorizing the Quran is one of the most noble acts a Muslim can pursue. We share 10 proven
                        techniques used by our expert Hifz teachers.
                    </p>

                    <a href="#" class="bbl-feat-btn bbl-reveal" style="animation-delay:.55s;">
                        Read Article <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Floating particles -->
        <div class="bbl-particles">
            @for($p = 1; $p <= 8; $p++)
                <div class="bbl-particle"
                    style="left:{{ rand(5, 95) }}%; animation-delay:{{ $p * .6 }}s; animation-duration:{{ 4 + ($p % 3) }}s;"></div>
            @endfor
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
    MAIN CONTENT + SIDEBAR
    ═══════════════════════════════════════════════ --}}
    <section class="bbl-main">
        <div class="container">
            <div class="row g-5">

                {{-- ─── POSTS LIST ─── --}}
                <div class="col-lg-8">

                    <!-- Section heading row -->
                    <div class="bbl-posts-heading bbl-sr" data-dir="up">
                        <div>
                            <span class="bbl-eyebrow">Islamic Knowledge</span>
                            <h2 class="bbl-h2">Latest <span>Articles</span></h2>
                        </div>
                        <div class="bbl-gold-rule"></div>
                    </div>

                    <!-- Post cards -->
                    @foreach($posts as $pi => $post)
                        <article class="bbl-card bbl-sr" data-dir="up" style="transition-delay:{{ ($pi % 3) * .1 }}s;">

                            {{-- Image --}}
                            <div class="bbl-card-thumb">
                                <img src="{{ asset('img/' . $post['img']) }}" alt="{{ $post['title'] }}">
                                <div class="bbl-card-thumb-overlay"></div>
                                <span class="bbl-card-badge"
                                    style="background:{{ $post['cat_color'] }};">{{ $post['cat'] }}</span>
                                <span class="bbl-card-read-badge">{{ $post['read'] }}</span>
                            </div>

                            {{-- Body --}}
                            <div class="bbl-card-body">
                                <div class="bbl-card-meta">
                                    <span><i class="fas fa-user-circle"></i> {{ $post['author'] }}</span>
                                    <span><i class="fas fa-calendar-alt"></i> {{ $post['date'] }}</span>
                                </div>

                                <h3 class="bbl-card-title">
                                    <a href="#" class="bbl-card-link">{{ $post['title'] }}</a>
                                </h3>

                                <p class="bbl-card-excerpt">{{ $post['excerpt'] }}</p>

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

                            {{-- Number watermark --}}
                            <div class="bbl-card-number">{{ str_pad($pi + 1, 2, '0', STR_PAD_LEFT) }}</div>

                        </article>
                    @endforeach

                    {{-- Pagination --}}
                    <nav class="bbl-pagination bbl-sr" data-dir="up">
                        <a href="#" class="bbl-pg bbl-pg--active">01</a>
                        <a href="#" class="bbl-pg">02</a>
                        <a href="#" class="bbl-pg">03</a>
                        <span class="bbl-pg-dots">···</span>
                        <a href="#" class="bbl-pg"><i class="fas fa-chevron-right"></i></a>
                    </nav>

                </div>{{-- /col --}}


                {{-- ─── SIDEBAR ─── --}}
                <aside class="col-lg-4 bbl-sr" data-dir="right">

                    {{-- Search --}}
                    <div class="bbl-widget bbl-widget--search">
                        <div class="bbl-widget-hd"><i class="fas fa-search"></i> Search</div>
                        <div class="bbl-widget-bd">
                            <div class="bbl-search">
                                <input type="text" placeholder="Search articles…">
                                <button><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    {{-- Quran verse --}}
                    <div class="bbl-verse">
                        <div class="bbl-verse-bg"></div>
                        <div class="bbl-verse-inner">
                            <div class="bbl-verse-arabic">اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ</div>
                            <div class="bbl-verse-line"></div>
                            <p class="bbl-verse-trans">"Read in the name of your Lord who created"</p>
                            <span class="bbl-verse-ref">Surah Al-Alaq — 96:1</span>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="bbl-widget">
                        <div class="bbl-widget-hd"><i class="fas fa-layer-group"></i> Categories</div>
                        <div class="bbl-widget-bd bbl-widget-bd--flush">
                            @foreach($categories as $cat)
                                <a href="#" class="bbl-cat">
                                    <span class="bbl-cat-dot" style="background:{{ $cat['color'] }};"></span>
                                    <span class="bbl-cat-name">{{ $cat['name'] }}</span>
                                    <span class="bbl-cat-count"
                                        style="color:{{ $cat['color'] }}; border-color:{{ $cat['color'] }}33;">{{ $cat['count'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Recent articles --}}
                    <div class="bbl-widget">
                        <div class="bbl-widget-hd"><i class="fas fa-history"></i> Recent Articles</div>
                        <div class="bbl-widget-bd bbl-widget-bd--flush">
                            @foreach($recent as $ri => $r)
                                <a href="#" class="bbl-recent {{ $ri < count($recent) - 1 ? 'bbl-recent--sep' : '' }}">
                                    <div class="bbl-recent-thumb">
                                        <img src="{{ asset('img/' . $r['img']) }}" alt="">
                                        <div class="bbl-recent-overlay"></div>
                                    </div>
                                    <div class="bbl-recent-text">
                                        <p class="bbl-recent-title">{{ $r['title'] }}</p>
                                        <span class="bbl-recent-date"><i class="fas fa-calendar-alt"></i>
                                            {{ $r['date'] }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Enroll CTA --}}
                    <div class="bbl-enroll-cta">
                        <div class="bbl-enroll-bg"></div>
                        <div class="bbl-enroll-inner">
                            <div class="bbl-enroll-icon"><i class="fas fa-quran"></i></div>
                            <h5 class="bbl-enroll-title">Begin Your Journey</h5>
                            <p class="bbl-enroll-text">Join Bismillah Islamic Academy and walk the path of Quranic
                                excellence today.</p>
                            <a href="{{('enroll') }}" class="bbl-enroll-btn">Enroll Now</a>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection


@push('styles')
    <style>
        /* ═══════════════════════════════════════════════
       FEATURED HERO
    ═══════════════════════════════════════════════ */
        .bbl-featured {
            position: relative;
            min-height: 620px;
            display: flex;
            align-items: flex-end;
            padding: 80px 0 70px;
            overflow: hidden;
        }

        .bbl-featured-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .bbl-featured-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .bbl-featured-scrim {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg,
                    rgba(13, 27, 42, 0.97) 0%,
                    rgba(13, 27, 42, 0.82) 55%,
                    rgba(13, 27, 42, 0.35) 100%);
        }

        /* Gold left border line */
        .bbl-featured::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            z-index: 4;
            background: linear-gradient(180deg, transparent, var(--gold), transparent);
        }

        /* Subtle geometric pattern overlay */
        .bbl-featured::after {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 2;
            opacity: .04;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Cpath d=%22M40 0L80 40L40 80L0 40Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        .bbl-feat-cat {
            display: inline-block;
            color: #fff;
            font-family: 'Lato', sans-serif;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 5px 16px;
            margin-bottom: 18px;
        }

        .bbl-feat-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(26px, 3.5vw, 46px);
            font-weight: 900;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .bbl-feat-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 18px;
        }

        .bbl-feat-meta span {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.55);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .bbl-feat-meta i {
            color: var(--gold);
        }

        .bbl-feat-excerpt {
            font-family: 'Lato', sans-serif;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.85;
            max-width: 520px;
            margin-bottom: 28px;
        }

        .bbl-feat-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold);
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 13px 30px;
            text-decoration: none;
            border: 2px solid var(--gold);
            transition: all .3s;
        }

        .bbl-feat-btn:hover {
            background: transparent;
            color: var(--gold-light);
        }

        .bbl-feat-btn i {
            transition: transform .3s;
        }

        .bbl-feat-btn:hover i {
            transform: translateX(5px);
        }

        /* ─── PARTICLES ─── */
        .bbl-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 2;
        }

        .bbl-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0;
            bottom: -10px;
            animation: bblFloat linear infinite;
        }

        @keyframes bblFloat {
            0% {
                opacity: 0;
                transform: translateY(0) scale(1);
            }

            10% {
                opacity: .5;
            }

            90% {
                opacity: .1;
            }

            100% {
                opacity: 0;
                transform: translateY(-150px) scale(.2);
            }
        }

        /* ─── HERO REVEAL ─── */
        .bbl-reveal {
            opacity: 0;
            transform: translateY(24px);
            animation: bblRev .8s cubic-bezier(.25, .46, .45, .94) forwards;
        }

        @keyframes bblRev {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ═══════════════════════════════════════════════
       SCROLL REVEAL
    ═══════════════════════════════════════════════ */
        .bbl-sr {
            opacity: 0;
            transition: opacity .75s ease, transform .75s cubic-bezier(.25, .46, .45, .94);
        }

        .bbl-sr[data-dir="up"] {
            transform: translateY(40px);
        }

        .bbl-sr[data-dir="right"] {
            transform: translateX(45px);
        }

        .bbl-sr.in {
            opacity: 1 !important;
            transform: translate(0) !important;
        }

        /* ═══════════════════════════════════════════════
       MAIN SECTION
    ═══════════════════════════════════════════════ */
        .bbl-main {
            background: var(--off-white);
            padding: 80px 0 100px;
        }

        /* posts heading */
        .bbl-posts-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 36px;
            gap: 20px;
        }

        .bbl-gold-rule {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, rgba(174, 130, 37, .4), transparent);
            margin-bottom: 8px;
        }

        .bbl-eyebrow {
            font-family: 'Cinzel', serif;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            display: block;
            margin-bottom: 6px;
        }

        .bbl-h2 {
            font-family: 'Cinzel', serif;
            font-size: clamp(22px, 3vw, 32px);
            color: var(--navy);
            font-weight: 800;
            line-height: 1.1;
            margin: 0;
        }

        .bbl-h2 span {
            color: var(--gold);
        }

        /* ═══════════════════════════════════════════════
       BLOG CARDS
    ═══════════════════════════════════════════════ */
        .bbl-card {
            display: flex;
            background: var(--white);
            border: 1px solid rgba(174, 130, 37, .1);
            margin-bottom: 24px;
            overflow: hidden;
            position: relative;
            transition: all .4s cubic-bezier(.25, .46, .45, .94);
            box-shadow: 0 2px 18px rgba(13, 27, 42, .05);
        }

        .bbl-card:hover {
            border-color: var(--gold);
            transform: translateY(-6px);
            box-shadow: 0 22px 50px rgba(13, 27, 42, .11);
        }

        /* animated left accent */
        .bbl-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--gold-dark), var(--gold-light));
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform .4s;
        }

        .bbl-card:hover::before {
            transform: scaleY(1);
        }

        /* thumbnail */
        .bbl-card-thumb {
            width: 220px;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        @media(max-width:767px) {
            .bbl-card {
                flex-direction: column;
            }

            .bbl-card-thumb {
                width: 100%;
                height: 200px;
            }
        }

        .bbl-card-thumb img {
            width: 100%;
            height: 100%;
            min-height: 230px;
            object-fit: cover;
            display: block;
            transition: transform .55s ease;
        }

        .bbl-card:hover .bbl-card-thumb img {
            transform: scale(1.08);
        }

        .bbl-card-thumb-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13, 27, 42, 0);
            transition: background .4s;
        }

        .bbl-card:hover .bbl-card-thumb-overlay {
            background: rgba(13, 27, 42, .2);
        }

        .bbl-card-badge {
            position: absolute;
            top: 0;
            left: 0;
            color: #fff;
            font-family: 'Lato', sans-serif;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 12px;
            z-index: 2;
        }

        .bbl-card-read-badge {
            position: absolute;
            bottom: 12px;
            right: 12px;
            background: rgba(13, 27, 42, .8);
            color: var(--gold-light);
            font-family: 'Lato', sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 4px 10px;
            z-index: 2;
            border: 1px solid rgba(174, 130, 37, .3);
        }

        /* card body */
        .bbl-card-body {
            padding: 26px 26px 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .bbl-card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 12px;
        }

        .bbl-card-meta span {
            font-family: 'Lato', sans-serif;
            font-size: 11px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .bbl-card-meta i {
            color: var(--gold);
            font-size: 11px;
        }

        .bbl-card-title {
            font-family: 'Cinzel', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.45;
            margin-bottom: 10px;
        }

        .bbl-card-link {
            color: var(--navy);
            text-decoration: none;
            transition: color .3s;
        }

        .bbl-card:hover .bbl-card-link {
            color: var(--gold-dark);
        }

        .bbl-card-excerpt {
            color: var(--text-mid);
            font-size: 13px;
            line-height: 1.85;
            margin-bottom: 18px;
            flex: 1;
        }

        .bbl-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid rgba(174, 130, 37, .1);
        }

        .bbl-read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--gold);
            text-decoration: none;
            transition: all .3s;
        }

        .bbl-read-more i {
            transition: transform .3s;
            font-size: 13px;
        }

        .bbl-read-more:hover {
            color: var(--gold-dark);
        }

        .bbl-read-more:hover i {
            transform: translateX(6px);
        }

        .bbl-card-icons {
            display: flex;
            gap: 8px;
        }

        .bbl-icon-btn {
            width: 32px;
            height: 32px;
            border: 1px solid rgba(174, 130, 37, .2);
            background: transparent;
            color: var(--text-muted);
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s;
        }

        .bbl-icon-btn:hover {
            background: var(--gold);
            color: #fff;
            border-color: var(--gold);
        }

        /* watermark number */
        .bbl-card-number {
            position: absolute;
            bottom: -10px;
            right: 14px;
            font-family: 'Cinzel', serif;
            font-size: 70px;
            font-weight: 900;
            line-height: 1;
            color: rgba(174, 130, 37, .06);
            pointer-events: none;
            user-select: none;
            transition: color .4s;
        }

        .bbl-card:hover .bbl-card-number {
            color: rgba(174, 130, 37, .1);
        }

        /* ═══════════════════════════════════════════════
       PAGINATION
    ═══════════════════════════════════════════════ */
        .bbl-pagination {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .bbl-pg {
            min-width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cinzel', serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
            background: var(--white);
            color: var(--text-mid);
            border: 1px solid rgba(174, 130, 37, .2);
            transition: all .3s;
            padding: 0 12px;
        }

        .bbl-pg:hover,
        .bbl-pg--active {
            background: var(--gold) !important;
            color: #fff !important;
            border-color: var(--gold) !important;
        }

        .bbl-pg-dots {
            color: var(--text-muted);
            font-size: 16px;
            letter-spacing: 2px;
            line-height: 1;
        }

        /* ═══════════════════════════════════════════════
       SIDEBAR WIDGETS
    ═══════════════════════════════════════════════ */
        .bbl-widget {
            background: var(--white);
            border: 1px solid rgba(174, 130, 37, .12);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .bbl-widget-hd {
            background: var(--navy);
            padding: 14px 20px;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold-light);
            display: flex;
            align-items: center;
            gap: 9px;
            border-bottom: 1px solid rgba(174, 130, 37, .2);
        }

        .bbl-widget-hd i {
            color: var(--gold);
            font-size: 12px;
        }

        .bbl-widget-bd {
            padding: 18px 20px;
        }

        .bbl-widget-bd--flush {
            padding: 0;
        }

        /* search */
        .bbl-widget--search {
            margin-bottom: 24px;
        }

        .bbl-search {
            display: flex;
        }

        .bbl-search input {
            flex: 1;
            padding: 11px 14px;
            border: 1px solid rgba(174, 130, 37, .2);
            border-right: none;
            background: var(--off-white);
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: var(--text-dark);
            outline: none;
            transition: border-color .3s;
        }

        .bbl-search input:focus {
            border-color: var(--gold);
        }

        .bbl-search button {
            width: 44px;
            background: var(--gold);
            border: none;
            color: #fff;
            font-size: 13px;
            cursor: pointer;
            transition: background .3s;
            flex-shrink: 0;
        }

        .bbl-search button:hover {
            background: var(--gold-dark);
        }

        /* Quran verse widget */
        .bbl-verse {
            position: relative;
            overflow: hidden;
            background: var(--navy);
            border: 1px solid rgba(174, 130, 37, .25);
            margin-bottom: 24px;
            padding: 32px 24px;
            text-align: center;
        }

        .bbl-verse-bg {
            position: absolute;
            inset: 0;
            opacity: .04;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        .bbl-verse-inner {
            position: relative;
            z-index: 2;
        }

        .bbl-verse-arabic {
            font-family: 'Amiri', serif;
            font-size: 22px;
            color: var(--gold-light);
            line-height: 1.9;
            margin-bottom: 12px;
            direction: rtl;
        }

        .bbl-verse-line {
            width: 40px;
            height: 1px;
            background: var(--gold);
            margin: 0 auto 12px;
        }

        .bbl-verse-trans {
            font-family: 'Amiri', serif;
            font-size: 14px;
            color: rgba(255, 255, 255, .65);
            font-style: italic;
            margin: 0 0 8px;
            line-height: 1.7;
        }

        .bbl-verse-ref {
            font-family: 'Lato', sans-serif;
            font-size: 10px;
            color: var(--gold);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* categories */
        .bbl-cat {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 20px;
            border-bottom: 1px solid rgba(174, 130, 37, .07);
            text-decoration: none;
            transition: all .3s;
        }

        .bbl-cat:last-child {
            border-bottom: none;
        }

        .bbl-cat:hover {
            background: rgba(174, 130, 37, .04);
            padding-left: 26px;
        }

        .bbl-cat-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
            transition: transform .3s;
        }

        .bbl-cat:hover .bbl-cat-dot {
            transform: scale(1.5);
        }

        .bbl-cat-name {
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: var(--text-mid);
            flex: 1;
            transition: color .3s;
        }

        .bbl-cat:hover .bbl-cat-name {
            color: var(--gold-dark);
        }

        .bbl-cat-count {
            font-family: 'Lato', sans-serif;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 9px;
            border: 1px solid;
            border-radius: 0;
        }

        /* recent */
        .bbl-recent {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 13px 20px;
            text-decoration: none;
            transition: all .3s;
        }

        .bbl-recent--sep {
            border-bottom: 1px solid rgba(174, 130, 37, .08);
        }

        .bbl-recent:hover {
            background: rgba(174, 130, 37, .04);
        }

        .bbl-recent-thumb {
            width: 64px;
            height: 56px;
            flex-shrink: 0;
            overflow: hidden;
            position: relative;
        }

        .bbl-recent-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s;
        }

        .bbl-recent:hover .bbl-recent-thumb img {
            transform: scale(1.1);
        }

        .bbl-recent-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13, 27, 42, 0);
            transition: background .3s;
        }

        .bbl-recent:hover .bbl-recent-overlay {
            background: rgba(13, 27, 42, .15);
        }

        .bbl-recent-title {
            font-family: 'Cinzel', serif;
            font-size: 12px;
            color: var(--navy);
            margin: 0 0 5px;
            line-height: 1.4;
            transition: color .3s;
        }

        .bbl-recent:hover .bbl-recent-title {
            color: var(--gold-dark);
        }

        .bbl-recent-date {
            font-family: 'Lato', sans-serif;
            font-size: 11px;
            color: var(--gold);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* enroll CTA widget */
        .bbl-enroll-cta {
            position: relative;
            overflow: hidden;
            background: var(--navy);
            border: 1px solid rgba(174, 130, 37, .25);
            padding: 34px 24px;
        }

        .bbl-enroll-bg {
            position: absolute;
            inset: 0;
            opacity: .06;
            background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
        }

        /* gold shimmer top border */
        .bbl-enroll-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold-light), var(--gold-dark));
            background-size: 200% 100%;
            animation: bblShimmer 2.5s linear infinite;
        }

        @keyframes bblShimmer {
            0% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 200% 0%;
            }
        }

        .bbl-enroll-inner {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .bbl-enroll-icon {
            font-size: 2.6rem;
            color: var(--gold-light);
            margin-bottom: 14px;
            display: block;
            animation: bblPulse 2.5s ease-in-out infinite;
        }

        @keyframes bblPulse {

            0%,
            100% {
                opacity: .8;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.08);
            }
        }

        .bbl-enroll-title {
            font-family: 'Cinzel', serif;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .bbl-enroll-text {
            font-family: 'Lato', sans-serif;
            font-size: 13px;
            color: rgba(255, 255, 255, .6);
            line-height: 1.75;
            margin-bottom: 20px;
        }

        .bbl-enroll-btn {
            display: inline-block;
            background: var(--gold);
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 12px 28px;
            text-decoration: none;
            border: 2px solid var(--gold);
            transition: all .3s;
        }

        .bbl-enroll-btn:hover {
            background: transparent;
            color: var(--gold-light);
        }
    </style>
@endpush


@push('scripts')
    <script>
        (function () {
            /* Scroll reveal */
            var els = document.querySelectorAll('.bbl-sr');
            if ('IntersectionObserver' in window) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) {
                            e.target.classList.add('in');
                            io.unobserve(e.target);
                        }
                    });
                }, { threshold: 0.08 });
                els.forEach(function (el) { io.observe(el); });
            } else {
                els.forEach(function (el) { el.classList.add('in'); });
            }

            /* Subtle card tilt */
            document.querySelectorAll('.bbl-card').forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var r = card.getBoundingClientRect();
                    var ry = ((e.clientX - r.left - r.width / 2) / (r.width / 2)) * 2.5;
                    var rx = ((e.clientY - r.top - r.height / 2) / (r.height / 2)) * -2.5;
                    card.style.transform = 'translateY(-6px) perspective(900px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg)';
                });
                card.addEventListener('mouseleave', function () {
                    card.style.transform = '';
                });
            });
        })();
    </script>
@endpush
