<!-- Topbar Start -->
<div class="topbar d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background:transparent; padding:0;">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admissions</a></li>
                        <li class="breadcrumb-item"><a href="#">Terms</a></li>
                        <li class="breadcrumb-item"><a href="#">Privacy</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 text-end">
                <small style="color:#666; font-size:11px; letter-spacing:2px; text-transform:uppercase;">Follow us:</small>
                <div class="social-links d-inline-flex align-items-center ms-2">
                    @if(\App\Models\SiteSetting::get('facebook'))
                        <a href="{{ \App\Models\SiteSetting::get('facebook') }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(\App\Models\SiteSetting::get('twitter'))
                        <a href="{{ \App\Models\SiteSetting::get('twitter') }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(\App\Models\SiteSetting::get('instagram'))
                        <a href="{{ \App\Models\SiteSetting::get('instagram') }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(\App\Models\SiteSetting::get('youtube'))
                        <a href="{{ \App\Models\SiteSetting::get('youtube') }}" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
