<!-- Topbar Start -->
<div class="topbar d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 d-flex align-items-center" style="gap:12px;">
                <span style="color:var(--gold-light);font-family:'Cinzel',serif;font-size:12px;font-weight:700;letter-spacing:1px;">Bismillah Islamic Academy</span>
                <div class="social-links d-inline-flex align-items-center" style="gap:5px;">
                    @if(\App\Models\SiteSetting::get('facebook'))
                        <a href="{{ \App\Models\SiteSetting::get('facebook') }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(\App\Models\SiteSetting::get('instagram'))
                        <a href="{{ \App\Models\SiteSetting::get('instagram') }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-end" style="gap:20px;">
                <small style="color:rgba(255,255,255,.4);font-size:11px;letter-spacing:.5px;">
                    <i class="far fa-clock" style="color:var(--gold-light);margin-right:4px;"></i>
                    <span style="color:rgba(255,255,255,.6);">{{ \App\Models\SiteSetting::get('class_hours', 'Mon–Sat') }}</span>
                    &nbsp;{{ \App\Models\SiteSetting::get('class_hours_extra', '24/7 - Hours') }}
                </small>
                <span style="color:rgba(255,255,255,.15);">|</span>
                <a href="https://wa.me/{{ str_replace('+','',\App\Models\SiteSetting::get('whatsapp','19295978179')) }}" target="_blank" style="font-size:11px;">
                    <span style="font-size:13px;">🇺🇸</span>
                    <span style="color:rgba(255,255,255,.4);font-size:10px;">USA</span>
                    {{ \App\Models\SiteSetting::get('phone', '+1 (929) 597-8179') }}
                </a>
                <span style="color:rgba(255,255,255,.15);">|</span>
                <a href="https://wa.me/{{ str_replace('+','',\App\Models\SiteSetting::get('whatsapp_uk','447415770822')) }}" target="_blank" style="font-size:11px;">
                    <span style="font-size:13px;">🇬🇧</span>
                    <span style="color:rgba(255,255,255,.4);font-size:10px;">United Kingdom</span>
                    {{ \App\Models\SiteSetting::get('phone_uk', '+44 7415 770822') }}
                </a>
                <span style="color:rgba(255,255,255,.15);">|</span>
                <a href="mailto:{{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}" style="font-size:11px;">
                    <i class="far fa-envelope" style="color:var(--gold-light);"></i>
                    {{ \App\Models\SiteSetting::get('email', 'bismillahquranacademy2@gmail.com') }}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
