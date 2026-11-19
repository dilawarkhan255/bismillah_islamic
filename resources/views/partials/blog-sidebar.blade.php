{{-- Blog sidebar, shared by the blog list and the single article page.
     Needs: $categories, $recent. Optional: $activeCategory, $search. --}}
<aside class="col-lg-4 bbl-sr" data-dir="right">

    <div class="bbl-widget bbl-widget--search">
        <div class="bbl-widget-hd"><i class="fas fa-search"></i> Search</div>
        <div class="bbl-widget-bd">
            <form class="bbl-search" action="{{ route('blog') }}" method="GET" role="search">
                <input type="search" name="q" value="{{ $search ?? '' }}" placeholder="Search articles…" aria-label="Search articles" maxlength="100">
                <button type="submit" aria-label="Search"><i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>

    <div class="bbl-verse">
        <div class="bbl-verse-bg"></div>
        <div class="bbl-verse-inner">
            <div class="bbl-verse-arabic">{{ section('blog', 'verse', 'title', 'اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ') }}</div>
            <div class="bbl-verse-line"></div>
            <p class="bbl-verse-trans">{{ section('blog', 'verse', 'subtitle', '"Read in the name of your Lord who created"') }}</p>
            <span class="bbl-verse-ref">{{ section('blog', 'verse', 'description', 'Surah Al-Alaq — 96:1') }}</span>
        </div>
    </div>

    <div class="bbl-widget">
        <div class="bbl-widget-hd"><i class="fas fa-layer-group"></i> {{ section('blog', 'widget_categories', 'title', 'Categories') }}</div>
        <div class="bbl-widget-bd bbl-widget-bd--flush">
            <a href="{{ route('blog') }}" class="bbl-cat {{ empty($activeCategory) && empty($search) && request()->routeIs('blog') ? 'bbl-cat--active' : '' }}">
                <span class="bbl-cat-dot" style="background:var(--gold);"></span>
                <span class="bbl-cat-name">All Articles</span>
                <span class="bbl-cat-count" style="color:var(--gold); border-color:rgba(174,130,37,.2);">{{ $categories->sum('posts_count') }}</span>
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('blog', ['category' => $cat->slug]) }}"
                   class="bbl-cat {{ !empty($activeCategory) && $activeCategory->id === $cat->id ? 'bbl-cat--active' : '' }}">
                    <span class="bbl-cat-dot" style="background:{{ $cat->color }};"></span>
                    <span class="bbl-cat-name">{{ $cat->name }}</span>
                    <span class="bbl-cat-count"
                        style="color:{{ $cat->color }}; border-color:{{ $cat->color }}33;">{{ $cat->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="bbl-widget">
        <div class="bbl-widget-hd"><i class="fas fa-history"></i> {{ section('blog', 'widget_recent', 'title', 'Recent Articles') }}</div>
        <div class="bbl-widget-bd bbl-widget-bd--flush">
            @foreach($recent as $ri => $r)
                <a href="{{ route('blog.show', $r->slug) }}" class="bbl-recent {{ $ri < count($recent) - 1 ? 'bbl-recent--sep' : '' }}">
                    <div class="bbl-recent-thumb">
                        <img src="{{ $r->image_url }}" alt="{{ $r->title }}" loading="lazy">
                        <div class="bbl-recent-overlay"></div>
                    </div>
                    <div class="bbl-recent-text">
                        <p class="bbl-recent-title">{{ $r->title }}</p>
                        @if($r->published_at)
                            <span class="bbl-recent-date"><i class="fas fa-calendar-alt"></i>
                                {{ $r->published_at->format('M j, Y') }}</span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="bbl-enroll-cta">
        <div class="bbl-enroll-bg"></div>
        <div class="bbl-enroll-inner">
            <div class="bbl-enroll-icon"><i class="fas fa-quran"></i></div>
            <h5 class="bbl-enroll-title">{{ section('blog', 'cta', 'title', 'Begin Your Journey') }}</h5>
            <p class="bbl-enroll-text">{{ section('blog', 'cta', 'description', 'Join Bismillah Islamic Academy and walk the path of Quranic excellence today.') }}</p>
            <a href="{{ url(section('blog', 'cta', 'button_url', '/free_trial')) }}" class="bbl-enroll-btn">{{ section('blog', 'cta', 'button_text', 'Enroll Now') }}</a>
        </div>
    </div>

</aside>
