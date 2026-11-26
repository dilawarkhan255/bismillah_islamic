<!-- Footer Start -->
@include('partials.prayer-times')
<div class="footer site-footer wow fadeIn" data-wow-delay="0.1s"
    style="background: var(--navy); border-top: 2px solid var(--gold);">
    <div class="container py-5">
        <div class="row g-5">

            {{-- Address --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Inter', sans-serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    {{ section('footer', 'address', 'title', 'Address') }}
                </h5>
                <p class="mb-2" style="font-size: 14px; color: rgba(255,255,255,0.5);">
                    <i class="{{ faIcon(section('footer', 'address', 'subtitle', 'fa-map-marker-alt')) }} me-3" style="color: var(--gold);"></i>{{ section('footer', 'address', 'description', 'JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan') }}
                </p>
                <a href="{{ section('footer', 'phone_pk', 'button_url', 'https://wa.me/923141833216') }}" target="_blank" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="{{ faIcon(section('footer', 'phone_pk', 'subtitle', 'fab fa-whatsapp')) }} me-3" style="color: var(--gold);"></i>{{ section('footer', 'phone_pk', 'description', '+92 314 1833216') }}
                </a>
                <a href="{{ section('footer', 'phone_uk', 'button_url', 'https://wa.me/447415770822') }}" target="_blank" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="{{ faIcon(section('footer', 'phone_uk', 'subtitle', 'fab fa-whatsapp')) }} me-3" style="color: var(--gold);"></i>{{ section('footer', 'phone_uk', 'description', '+44 7415 770822') }}
                </a>
                <a href="{{ section('footer', 'email', 'button_url', 'mailto:bismillahquranacademy2@gmail.com') }}" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="{{ faIcon(section('footer', 'email', 'subtitle', 'fa-envelope')) }} me-3" style="color: var(--gold);"></i>{{ section('footer', 'email', 'description', 'bismillahquranacademy2@gmail.com') }}
                </a>
                @php
                    $socialRaw = section('footer', 'social', 'description', 'Facebook|https://www.facebook.com/share/1JPSiUdTG3/?mibextid=wwXIfr|fa-facebook-f,Instagram|https://www.instagram.com/bismillahislamicacademy?igsh=OWxiZHZwc2l5aXd6&utm_source=qr|fa-instagram,YouTube||fa-youtube');
                    $socialLinks = array_filter(explode(',', $socialRaw));
                @endphp
                <div class="d-flex pt-2" style="gap: 9px;">
                    @foreach($socialLinks as $social)
                        @php
                            $parts = explode('|', trim($social));
                            $name = $parts[0] ?? '';
                            $url = $parts[1] ?? '';
                            $icon = $parts[2] ?? '';
                        @endphp
                        @if($url && $icon)
                        <a class="hv-12" href="{{ $url }}" target="_blank">
                            <i class="{{ faIcon($icon) }}"></i>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Inter', sans-serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Quick Links
                </h5>
                {{-- Only the key pages here; the rest live in the navbar "More" menu --}}
                <div class="footer-links">
                    <a class="hv-13" href="{{ route('courses') }}">
                        <span style="color: var(--gold);">› </span>Our Courses
                    </a>
                    <a class="hv-13" href="{{ route('free_trial') }}">
                        <span style="color: var(--gold);">› </span>Free Trial
                    </a>
                    <a class="hv-13" href="{{ route('pricing') }}">
                        <span style="color: var(--gold);">› </span>Pricing
                    </a>
                    <a class="hv-13" href="{{ route('about') }}">
                        <span style="color: var(--gold);">› </span>About Us
                    </a>
                    <a class="hv-13" href="{{ route('contact') }}">
                        <span style="color: var(--gold);">› </span>Contact Us
                    </a>
                </div>
            </div>

            {{-- Gallery --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Inter', sans-serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Gallery
                </h5>
                <div class="row g-2">
                    @php
                        $footerGallery = \App\Support\ContentCache::remember('gallery.footer', fn () => \App\Models\GalleryItem::active()->take(6)->get());
                    @endphp
                    @forelse($footerGallery as $item)
                        <div class="col-4">
                            <a href="{{ route('gallery') }}" style="text-decoration:none;">
                                <img loading="lazy" decoding="async" class="img-fluid hv-14" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                    @empty
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-4">
                                <a href="{{ route('gallery') }}" style="text-decoration:none;">
                                    <img loading="lazy" decoding="async" class="img-fluid hv-14" src="{{ asset('storage/project-' . $i . '.jpg') }}" alt="Gallery Image">
                                </a>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Inter', sans-serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    {{ section('footer', 'newsletter', 'title', 'Start Learning') }}
                </h5>
                <p style="font-size: 14px; color: rgba(255,255,255,0.5); margin-bottom: 18px;">
                    {{ section('footer', 'newsletter', 'description', 'Book 3 free trial classes with a qualified teacher. No payment, no commitment.') }}
                </p>
                  <button class="bia-enroll-btn" data-bs-toggle="modal" data-bs-target="#enrollModal">
                    <span>{{ section('footer', 'newsletter', 'button_text', 'Enroll Now') }}</span>
                </button>

            </div>

        </div>
    </div>

    {{-- Copyright --}}
    <div style="border-top: 1px solid rgba(174,130,37,0.12); padding: 18px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span style="font-size: 12px; color: rgba(255,255,255,0.3);">
                        {{-- Year always current, whatever year is saved in Page Content --}}
                        {{ preg_replace('/©\s*\d{4}/u', '© ' . date('Y'), section('footer', 'copyright', 'title', '© ' . date('Y') . ' Bismillah Islamic Academy. All Rights Reserved.')) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
