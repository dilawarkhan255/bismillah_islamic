<!-- Footer Start -->
<div class="footer wow fadeIn" data-wow-delay="0.1s"
    style="background: var(--navy); border-top: 2px solid var(--gold);">
    <div class="container py-5">
        <div class="row g-5">

            {{-- Address --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Address
                </h5>
                <p class="mb-2" style="font-size: 14px; color: rgba(255,255,255,0.5);">
                    <i class="fa fa-map-marker-alt me-3" style="color: var(--gold);"></i>{{ \App\Models\SiteSetting::get('address', 'JWFX+4HV, Jhangi Sayedan, Islamabad, Pakistan') }}
                </p>
                <a href="https://wa.me/{{ \App\Models\SiteSetting::get('whatsapp', '923141833216') }}" target="_blank" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="fab fa-whatsapp me-3" style="color: var(--gold);"></i>{{ \App\Models\SiteSetting::get('phone', '+92 314 1833216') }}
                </a>
                <a href="https://wa.me/{{ \App\Models\SiteSetting::get('whatsapp_uk', '447415770822') }}" target="_blank" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="fab fa-whatsapp me-3" style="color: var(--gold);"></i>{{ \App\Models\SiteSetting::get('phone_uk', '+44 7415 770822') }}
                </a>
                <a href="mailto:{{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}" class="mb-2 d-block"
                    style="font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none;">
                    <i class="fa fa-envelope me-3" style="color: var(--gold);"></i>{{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}
                </a>
                <div class="d-flex pt-2" style="gap: 9px;">
                    @if(\App\Models\SiteSetting::get('facebook'))
                    <a href="{{ \App\Models\SiteSetting::get('facebook') }}" target="_blank"
                        style="width: 36px; height: 36px; border: 1px solid rgba(174,130,37,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.5); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.background='var(--gold)'; this.style.borderColor='var(--gold)'; this.style.color='white';"
                        onmouseout="this.style.background='transparent'; this.style.borderColor='rgba(174,130,37,0.3)'; this.style.color='rgba(255,255,255,0.5)';">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if(\App\Models\SiteSetting::get('instagram'))
                    <a href="{{ \App\Models\SiteSetting::get('instagram') }}" target="_blank"
                        style="width: 36px; height: 36px; border: 1px solid rgba(174,130,37,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.5); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.background='var(--gold)'; this.style.borderColor='var(--gold)'; this.style.color='white';"
                        onmouseout="this.style.background='transparent'; this.style.borderColor='rgba(174,130,37,0.3)'; this.style.color='rgba(255,255,255,0.5)';">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if(\App\Models\SiteSetting::get('youtube'))
                    <a href="{{ \App\Models\SiteSetting::get('youtube') }}" target="_blank"
                        style="width: 36px; height: 36px; border: 1px solid rgba(174,130,37,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.5); font-size: 13px; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.background='var(--gold)'; this.style.borderColor='var(--gold)'; this.style.color='white';"
                        onmouseout="this.style.background='transparent'; this.style.borderColor='rgba(174,130,37,0.3)'; this.style.color='rgba(255,255,255,0.5)';">
                        <i class="fab fa-youtube"></i>
                    </a>
                    @endif
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
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="col-4">
                            <img class="img-fluid" src="{{ setting('img_footer_project_' . $i) ? asset('storage/' . setting('img_footer_project_' . $i)) : asset('img/project-' . $i . '.jpg') }}" alt="Gallery Image"
                                style="width: 100%; height: 68px; object-fit: cover; opacity: 0.6; transition: opacity 0.3s; border-radius: 2px;"
                                onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0.6';">
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="col-lg-3 col-md-6">
                <h5
                    style="font-family: 'Cinzel', serif; color: var(--gold-light); font-size: 13px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 22px; padding-bottom: 12px; border-bottom: 1px solid rgba(174,130,37,0.2);">
                    Newsletter
                </h5>
                <p style="font-size: 14px; color: rgba(255,255,255,0.5); margin-bottom: 18px;">
                    Subscribe to receive updates on new courses and Islamic events.
                </p>
                  <button class="bia-enroll-btn" data-bs-toggle="modal" data-bs-target="#enrollModal">
                    <span>Enroll Now</span>
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
                        {{ \App\Models\SiteSetting::get('copyright', '© 2026 Bismillah Islamic Academy. All Rights Reserved.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
