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
                ✦ Islamic Knowledge ✦</div>
            <h1
                style="font-family:'Cinzel',serif; font-size:clamp(30px,5vw,54px); font-weight:900; color:#fff; margin-bottom:18px;">
                Articles & Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0" style="background:transparent;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            style="color:rgba(255,255,255,0.6); text-decoration:none; font-family:'Lato',sans-serif; font-size:13px;">Home</a>
                    </li>
                    <li class="breadcrumb-item active"
                        style="color:var(--gold-light); font-family:'Lato',sans-serif; font-size:13px;" aria-current="page">
                        Blog</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- ===================== BLOG CONTENT ===================== -->
    <section style="background: var(--white); padding: 90px 0;">
        <div class="container">
            <div class="row g-5">

                <!-- ===== MAIN BLOG POSTS ===== -->
                <div class="col-lg-8">
                    <div class="mb-4 animate-on-scroll">
                        <div class="section-label">Latest Articles</div>
                        <h2 class="section-title">Islamic <span>Knowledge & Guidance</span></h2>
                        <div class="divider-gold" style="margin:15px 0;"></div>
                    </div>

                    @php
                        $posts = [
                            [
                                'img' => 'project-1.jpg',
                                'cat' => 'Quran Learning',
                                'cat_color' => '#2e7d32',
                                'title' => '10 Proven Tips To Memorize The Quran Faster',
                                'excerpt' => 'Memorizing the Quran is one of the most noble acts a Muslim can pursue. In this article, we share 10 proven techniques used by our Hifz teachers to help students memorize effectively and retain what they learn.',
                                'author' => 'Sheikh Abdullah',
                                'date' => 'March 5, 2025',
                                'read' => '5 min read',
                                'delay' => '0s',
                            ],
                            [
                                'img' => 'project-2.jpg',
                                'cat' => 'Tajweed',
                                'cat_color' => '#e65100',
                                'title' => 'The Importance of Tajweed: Why Correct Recitation Matters',
                                'excerpt' => 'Tajweed is not just about beautiful recitation — it is an obligation upon every Muslim. Learn about the rules of Tajweed, why scholars consider it Fard Kifayah, and how to start learning today.',
                                'author' => 'Ustaz Ibrahim',
                                'date' => 'February 20, 2025',
                                'read' => '7 min read',
                                'delay' => '0.1s',
                            ],
                            [
                                'img' => 'project-3.jpg',
                                'cat' => 'Islamic Parenting',
                                'cat_color' => '#1565c0',
                                'title' => 'How To Raise Quran-Loving Children in a Modern World',
                                'excerpt' => 'In an age of screens and distractions, raising children with a love for the Quran requires intention and strategy. Ustaza Fatima shares practical advice for parents on building a Quran-centered home environment.',
                                'author' => 'Ustaza Fatima',
                                'date' => 'February 8, 2025',
                                'read' => '6 min read',
                                'delay' => '0.2s',
                            ],
                            [
                                'img' => 'project-4.jpg',
                                'cat' => 'Arabic Language',
                                'cat_color' => '#00695c',
                                'title' => 'Why Every Muslim Should Learn Arabic — Even Basics',
                                'excerpt' => 'Understanding Arabic — even at a basic level — transforms your relationship with the Quran, Salah, and Duas. We explain the first steps to start learning Quranic Arabic from scratch.',
                                'author' => 'Sheikh Abdullah',
                                'date' => 'January 25, 2025',
                                'read' => '4 min read',
                                'delay' => '0.3s',
                            ],
                            [
                                'img' => 'project-5.jpg',
                                'cat' => 'Ramadan Guide',
                                'cat_color' => '#6a1b9a',
                                'title' => 'A Complete Ramadan Quran Guide: How To Finish The Quran This Month',
                                'excerpt' => 'Ramadan is the month of the Quran. With the right daily plan, anyone can complete the entire Quran during Ramadan. Download our free schedule and practical tips inside.',
                                'author' => 'Ustaz Ibrahim',
                                'date' => 'January 10, 2025',
                                'read' => '8 min read',
                                'delay' => '0.4s',
                            ],
                            [
                                'img' => 'project-6.jpg',
                                'cat' => 'Islamic Studies',
                                'cat_color' => '#c62828',
                                'title' => 'Understanding Aqeedah: The Foundation of Islamic Belief',
                                'excerpt' => 'A correct understanding of Aqeedah — Islamic creed — is the foundation upon which all worship is built. This article introduces the key pillars of Islamic belief that every Muslim must know.',
                                'author' => 'Sheikh Abdullah',
                                'date' => 'December 18, 2024',
                                'read' => '9 min read',
                                'delay' => '0.5s',
                            ],
                        ];
                    @endphp

                    @foreach($posts as $post)
                        <article style="
                            background: var(--white); border:1px solid var(--border-soft);
                            margin-bottom:35px; transition: all 0.3s;
                            box-shadow: 0 2px 15px rgba(13,27,42,0.05);
                        " class="blog-card animate-on-scroll" style="transition-delay:{{ $post['delay'] }}">
                            <div class="row g-0">
                                <!-- Image -->
                                <div class="col-md-4" style="overflow:hidden;">
                                    <div style="position:relative; height:100%; min-height:220px; overflow:hidden;">
                                        <img src="{{ asset('img/' . $post['img']) }}" alt="{{ $post['title'] }}"
                                            style="width:100%; height:100%; object-fit:cover; min-height:220px; transition: transform 0.5s;"
                                            class="blog-img">
                                        <span style="
                                            position:absolute; top:14px; left:14px;
                                            background: {{ $post['cat_color'] }};
                                            color:#fff; font-family:'Lato',sans-serif;
                                            font-size:10px; font-weight:700; letter-spacing:1.5px;
                                            text-transform:uppercase; padding:3px 10px;
                                        ">{{ $post['cat'] }}</span>
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="col-md-8">
                                    <div style="padding:28px 28px 24px;">
                                        <!-- Meta -->
                                        <div style="display:flex; gap:16px; flex-wrap:wrap; margin-bottom:12px;">
                                            <span
                                                style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted);">
                                                <i class="fa fa-user"
                                                    style="color:var(--gold); margin-right:5px;"></i>{{ $post['author'] }}
                                            </span>
                                            <span
                                                style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted);">
                                                <i class="fa fa-calendar"
                                                    style="color:var(--gold); margin-right:5px;"></i>{{ $post['date'] }}
                                            </span>
                                            <span
                                                style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted);">
                                                <i class="far fa-clock"
                                                    style="color:var(--gold); margin-right:5px;"></i>{{ $post['read'] }}
                                            </span>
                                        </div>

                                        <h3
                                            style="font-family:'Cinzel',serif; font-size:16px; font-weight:700; color:var(--navy); line-height:1.4; margin-bottom:12px;">
                                            <a href="#" style="color:var(--navy); text-decoration:none; transition:color 0.3s;"
                                                class="post-title-link">{{ $post['title'] }}</a>
                                        </h3>

                                        <p style="color:var(--text-mid); font-size:13px; line-height:1.8; margin-bottom:18px;">
                                            {{ $post['excerpt'] }}
                                        </p>

                                        <div
                                            style="display:flex; align-items:center; justify-content:space-between; padding-top:15px; border-top:1px solid var(--border-soft);">
                                            <a href="#" style="
                                                font-family:'Cinzel',serif; font-size:11px;
                                                font-weight:700; letter-spacing:1.5px; text-transform:uppercase;
                                                color:var(--gold); text-decoration:none;
                                                display:flex; align-items:center; gap:6px; transition: all 0.3s;
                                            " class="read-more">
                                                Read More <i class="fas fa-arrow-right" style="font-size:10px;"></i>
                                            </a>
                                            <div style="display:flex; gap:10px;">
                                                <a href="#"
                                                    style="color:var(--text-muted); font-size:13px; text-decoration:none; transition:color 0.3s;"
                                                    class="share-link" title="Share"><i class="fa fa-share-alt"></i></a>
                                                <a href="#"
                                                    style="color:var(--text-muted); font-size:13px; text-decoration:none; transition:color 0.3s;"
                                                    class="share-link" title="Bookmark"><i class="far fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

                    <!-- Pagination -->
                    <div style="display:flex; justify-content:center; gap:8px; margin-top:20px;" class="animate-on-scroll">
                        <a href="#"
                            style="width:40px; height:40px; background:var(--gold); color:var(--white); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; text-decoration:none;">1</a>
                        <a href="#"
                            style="width:40px; height:40px; background:transparent; color:var(--text-mid); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; text-decoration:none; transition:all 0.3s;"
                            class="page-link-custom">2</a>
                        <a href="#"
                            style="width:40px; height:40px; background:transparent; color:var(--text-mid); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; text-decoration:none; transition:all 0.3s;"
                            class="page-link-custom">3</a>
                        <a href="#"
                            style="width:40px; height:40px; background:transparent; color:var(--text-mid); border:1px solid var(--border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; text-decoration:none; transition:all 0.3s;"
                            class="page-link-custom"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>


                <!-- ===== SIDEBAR ===== -->
                <div class="col-lg-4 animate-on-scroll" style="transition-delay:0.2s">

                    <!-- Search -->
                    <div
                        style="background:var(--light-bg); border:1px solid var(--border-soft); padding:25px; margin-bottom:28px;">
                        <h5
                            style="font-family:'Cinzel',serif; color:var(--navy); font-size:13px; letter-spacing:2px; text-transform:uppercase; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid var(--border-soft);">
                            Search Articles</h5>
                        <div style="position:relative;">
                            <input type="text" placeholder="Search..." style="
                                width:100%; padding:11px 45px 11px 14px;
                                border:1px solid var(--border); background:var(--white);
                                font-family:'Lato',sans-serif; font-size:13px;
                                color:var(--text-dark); outline:none; border-radius:0;
                            ">
                            <button style="
                                position:absolute; right:0; top:0; bottom:0;
                                width:42px; background:var(--gold); border:none;
                                color:var(--white); cursor:pointer;
                            "><i class="fa fa-search" style="font-size:13px;"></i></button>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div
                        style="background:var(--light-bg); border:1px solid var(--border-soft); padding:25px; margin-bottom:28px;">
                        <h5
                            style="font-family:'Cinzel',serif; color:var(--navy); font-size:13px; letter-spacing:2px; text-transform:uppercase; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid var(--border-soft);">
                            Categories</h5>
                        @php
                            $categories = [
                                ['name' => 'Quran Learning', 'count' => 12, 'color' => '#2e7d32'],
                                ['name' => 'Tajweed', 'count' => 8, 'color' => '#e65100'],
                                ['name' => 'Islamic Parenting', 'count' => 6, 'color' => '#1565c0'],
                                ['name' => 'Arabic Language', 'count' => 5, 'color' => '#00695c'],
                                ['name' => 'Ramadan Guide', 'count' => 4, 'color' => '#6a1b9a'],
                                ['name' => 'Islamic Studies', 'count' => 10, 'color' => '#c62828'],
                            ];
                        @endphp
                        @foreach($categories as $cat)
                            <a href="#" style="
                                display:flex; justify-content:space-between; align-items:center;
                                padding:9px 0; border-bottom:1px solid var(--border-soft);
                                text-decoration:none; transition: all 0.3s;
                            " class="cat-link">
                                <span
                                    style="font-family:'Lato',sans-serif; font-size:13px; color:var(--text-mid); transition:color 0.3s;"
                                    class="cat-name">
                                    <i class="fas fa-chevron-right"
                                        style="color:var(--gold); font-size:10px; margin-right:8px;"></i>{{ $cat['name'] }}
                                </span>
                                <span
                                    style="background:{{ $cat['color'] }}22; color:{{ $cat['color'] }}; font-family:'Lato',sans-serif; font-size:11px; font-weight:700; padding:2px 8px;">{{ $cat['count'] }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Recent Posts -->
                    <div
                        style="background:var(--light-bg); border:1px solid var(--border-soft); padding:25px; margin-bottom:28px;">
                        <h5
                            style="font-family:'Cinzel',serif; color:var(--navy); font-size:13px; letter-spacing:2px; text-transform:uppercase; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid var(--border-soft);">
                            Recent Articles</h5>
                        @php
                            $recent = [
                                ['img' => 'project-1.jpg', 'title' => '10 Tips To Memorize The Quran Faster', 'date' => 'Mar 5, 2025'],
                                ['img' => 'project-2.jpg', 'title' => 'Why Tajweed Is Obligatory For Every Muslim', 'date' => 'Feb 20, 2025'],
                                ['img' => 'project-3.jpg', 'title' => 'Raising Quran-Loving Children', 'date' => 'Feb 8, 2025'],
                            ];
                        @endphp
                        @foreach($recent as $r)
                            <a href="#"
                                style="display:flex; gap:12px; padding:10px 0; border-bottom:1px solid var(--border-soft); text-decoration:none;"
                                class="recent-link">
                                <img src="{{ asset('img/' . $r['img']) }}" alt="{{ $r['title'] }}"
                                    style="width:60px; height:55px; object-fit:cover; flex-shrink:0; transition:opacity 0.3s;">
                                <div>
                                    <p style="font-family:'Cinzel',serif; font-size:12px; color:var(--navy); margin:0 0 4px; line-height:1.4; transition:color 0.3s;"
                                        class="recent-title">{{ $r['title'] }}</p>
                                    <span style="font-family:'Lato',sans-serif; font-size:11px; color:var(--gold);"><i
                                            class="fa fa-calendar me-1"></i>{{ $r['date'] }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Quran Verse Widget -->
                    <div
                        style="background:var(--navy); border:1px solid rgba(174,130,37,0.3); padding:28px 25px; text-align:center;">
                        <div
                            style="font-family:'Amiri',serif; font-size:22px; color:var(--gold-light); line-height:1.8; margin-bottom:14px; direction:rtl;">
                            اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ
                        </div>
                        <div style="width:40px; height:1px; background:var(--gold); margin:0 auto 12px;"></div>
                        <p
                            style="font-family:'Amiri',serif; font-size:14px; color:rgba(255,255,255,0.65); font-style:italic; margin:0 0 8px;">
                            "Read in the name of your Lord who created"
                        </p>
                        <span
                            style="font-family:'Lato',sans-serif; font-size:11px; color:var(--gold); letter-spacing:2px; text-transform:uppercase;">Surah
                            Al-Alaq 96:1</span>
                    </div>

                </div>
            </div>
        </div>
    </section>


    @include('partials.footer')

@endsection

@push('styles')
    <style>
        .blog-card:hover {
            border-color: var(--gold) !important;
            box-shadow: 0 15px 40px rgba(13, 27, 42, 0.1) !important;
        }

        .blog-card:hover .blog-img {
            transform: scale(1.05);
        }

        .blog-card:hover .post-title-link {
            color: var(--gold) !important;
        }

        .read-more:hover {
            color: var(--gold-dark) !important;
            gap: 10px !important;
        }

        .share-link:hover {
            color: var(--gold) !important;
        }

        .cat-link:hover .cat-name {
            color: var(--gold-dark) !important;
            padding-left: 6px;
        }

        .recent-link:hover img {
            opacity: 0.8;
        }

        .recent-link:hover .recent-title {
            color: var(--gold) !important;
        }

        .page-link-custom:hover {
            background: var(--gold) !important;
            color: var(--white) !important;
            border-color: var(--gold) !important;
        }
    </style>
@endpush
