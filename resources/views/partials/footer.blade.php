<!-- Footer Start -->
<div class="footer wow fadeIn" data-wow-delay="0.1s"
    style="background: var(--navy); border-top: 2px solid var(--gold);">
    <div class="container py-5">
        <div class="row g-5">

            {{-- Address --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
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
                        <a href="{{ $url }}" target="_blank"
                            style="width: 36px; height: 36px; border: 1px solid rgba(174,130,37,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.5); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                            onmouseover="this.style.background='var(--gold)'; this.style.borderColor='var(--gold)'; this.style.color='white';"
                            onmouseout="this.style.background='transparent'; this.style.borderColor='rgba(174,130,37,0.3)'; this.style.color='rgba(255,255,255,0.5)';">
                            <i class="{{ faIcon($icon) }}"></i>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Quick Links
                </h5>
                <div class="footer-links">
                    <a href="{{ route('about') }}"
                        style="display: block; color: rgba(255,255,255,0.5); text-decoration: none; font-size: 13px; padding: 6px 0; border-bottom: 1px solid rgba(174,130,37,0.06); transition: all 0.3s; font-family: 'Lato', sans-serif;"
                        onmouseover="this.style.color='var(--gold-light)'; this.style.paddingLeft='8px';"
                        onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0';">
                        <span style="color: var(--gold);">› </span>About Us
                    </a>
                    <a href="{{ route('contact') }}"
                        style="display: block; color: rgba(255,255,255,0.5); text-decoration: none; font-size: 13px; padding: 6px 0; border-bottom: 1px solid rgba(174,130,37,0.06); transition: all 0.3s; font-family: 'Lato', sans-serif;"
                        onmouseover="this.style.color='var(--gold-light)'; this.style.paddingLeft='8px';"
                        onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0';">
                        <span style="color: var(--gold);">› </span>Contact Us
                    </a>
                    <a href="{{ route('courses') }}"
                        style="display: block; color: rgba(255,255,255,0.5); text-decoration: none; font-size: 13px; padding: 6px 0; border-bottom: 1px solid rgba(174,130,37,0.06); transition: all 0.3s; font-family: 'Lato', sans-serif;"
                        onmouseover="this.style.color='var(--gold-light)'; this.style.paddingLeft='8px';"
                        onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0';">
                        <span style="color: var(--gold);">› </span>Our Courses
                    </a>
                    <a href="{{ route('pricing') }}"
                        style="display: block; color: rgba(255,255,255,0.5); text-decoration: none; font-size: 13px; padding: 6px 0; border-bottom: 1px solid rgba(174,130,37,0.06); transition: all 0.3s; font-family: 'Lato', sans-serif;"
                        onmouseover="this.style.color='var(--gold-light)'; this.style.paddingLeft='8px';"
                        onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0';">
                        <span style="color: var(--gold);">› </span>Pricing
                    </a>
                      <a href="{{ route('privacy_policy') }}"
                        style="display: block; color: rgba(255,255,255,0.5); text-decoration: none; font-size: 13px; padding: 6px 0; border-bottom: 1px solid rgba(174,130,37,0.06); transition: all 0.3s; font-family: 'Lato', sans-serif;"
                        onmouseover="this.style.color='var(--gold-light)'; this.style.paddingLeft='8px';"
                        onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0';">
                        <span style="color: var(--gold);">› </span>Privacy Policy
                    </a>
                </div>
            </div>

            {{-- Gallery --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Gallery
                </h5>
                <div class="row g-2">
                    @php
                        $footerGallery = \App\Models\GalleryItem::active()->take(6)->get();
                    @endphp
                    @forelse($footerGallery as $item)
                        <div class="col-4">
                            <a href="{{ route('gallery') }}" style="text-decoration:none;">
                                <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    style="width: 100%; height: 68px; object-fit: cover; opacity: 0.6; transition: opacity 0.3s; border-radius: 2px;"
                                    onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0.6';">
                            </a>
                        </div>
                    @empty
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-4">
                                <a href="{{ route('gallery') }}" style="text-decoration:none;">
                                    <img class="img-fluid" src="{{ asset('storage/project-' . $i . '.jpg') }}" alt="Gallery Image"
                                        style="width: 100%; height: 68px; object-fit: cover; opacity: 0.6; transition: opacity 0.3s; border-radius: 2px;"
                                        onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0.6';">
                                </a>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    {{ section('footer', 'newsletter', 'title', 'Newsletter') }}
                </h5>
                <p style="font-size: 14px; color: rgba(255,255,255,0.5); margin-bottom: 18px;">
                    {{ section('footer', 'newsletter', 'description', 'Subscribe to receive updates on new courses and Islamic events.') }}
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
                        {{ section('footer', 'copyright', 'title', '© 2026 Bismillah Islamic Academy. All Rights Reserved.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
