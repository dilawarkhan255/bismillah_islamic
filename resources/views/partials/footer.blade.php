<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <!-- Address Column -->
            <div class="col-lg-3 col-md-6 animate-on-scroll">
                <h5>Contact Us</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-2"></i> 123 Islamic Center Road, City, Country</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-2"></i> +012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-2"></i> info@bismillah.academy</p>
                <p class="mb-2"><i class="far fa-clock me-2"></i> Mon – Sat: 6:00 PM – 3:00 AM</p>
                <div class="footer-social">
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.1s">
                <h5>Quick Links</h5>
                <div class="footer-links">
                    <a href="{{ route('about') }}">About Us</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('courses') }}">Our Courses</a>
                    <a href="#">Admissions</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Support</a>
                </div>
            </div>

            <!-- Gallery -->
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.2s">
                <h5>Gallery</h5>
                <div class="footer-gallery">
                    @for($i = 1; $i <= 6; $i++)
                    <img src="{{ asset('img/project-' . $i . '.jpg') }}" alt="Gallery Image {{ $i }}">
                    @endfor
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6 animate-on-scroll" style="transition-delay:0.3s">
                <h5>Newsletter</h5>
                <p style="font-size:13px; margin-bottom:20px;">Stay updated with our latest courses, events and Islamic reminders.</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                    <button type="button">Subscribe</button>
                </div>
                <div class="mt-4">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height:55px; opacity:0.5;">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">Bismillah Islamic Academy</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p>Designed with <i class="fa fa-heart" style="color:var(--gold);"></i> for the sake of Allah</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
