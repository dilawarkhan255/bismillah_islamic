<!-- Topbar -->
<div class="container-fluid bg-light px-0">
    <div class="row gx-0 align-items-center d-none d-lg-flex">

        <div class="col-lg-6 px-5 text-start">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a class="small text-secondary" href="#">Home</a>
                </li>

                <li class="breadcrumb-item">
                    <a class="small text-secondary" href="#">Courses</a>
                </li>

                <li class="breadcrumb-item">
                    <a class="small text-secondary" href="#">Teachers</a>
                </li>

                <li class="breadcrumb-item">
                    <a class="small text-secondary" href="#">Privacy</a>
                </li>

            </ol>

        </div>

        <div class="col-lg-6 px-5 text-end">

            <small>Follow us:</small>

            <div class="h-100 d-inline-flex align-items-center">

                <a class="btn-square text-primary border-end rounded-0" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a class="btn-square text-primary border-end rounded-0" href="#">
                    <i class="fab fa-twitter"></i>
                </a>

                <a class="btn-square text-primary border-end rounded-0" href="#">
                    <i class="fab fa-instagram"></i>
                </a>

            </div>

        </div>

    </div>
</div>


<!-- Brand -->

<div class="container-fluid py-4 px-5">

    <div class="row align-items-center">

        <div class="col-lg-4 text-center text-lg-start">

            <a href="{{ url('/') }}" class="navbar-brand">

                <h1 class="fw-bold text-primary m-0">

                    <i class="fa fa-mosque me-2"></i>
                    Bismillah Islamic Academy

                </h1>

            </a>

        </div>

        <div class="col-lg-8 d-none d-lg-block">

            <div class="row">

                <div class="col-4">

                    <div class="d-flex align-items-center justify-content-end">

                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-clock text-primary"></i>
                        </div>

                        <div class="ps-3">
                            <p class="mb-2">Opening Hour</p>
                            <h6 class="mb-0">Mon - Fri</h6>
                        </div>

                    </div>

                </div>

                <div class="col-4">

                    <div class="d-flex align-items-center justify-content-end">

                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="fa fa-phone text-primary"></i>
                        </div>

                        <div class="ps-3">
                            <p class="mb-2">Call Us</p>
                            <h6 class="mb-0">+92 300 0000000</h6>
                        </div>

                    </div>

                </div>

                <div class="col-4">

                    <div class="d-flex align-items-center justify-content-end">

                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-envelope text-primary"></i>
                        </div>

                        <div class="ps-3">
                            <p class="mb-2">Email</p>
                            <h6 class="mb-0">info@bismillahacademy.com</h6>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">

        <div class="navbar-nav me-auto p-3 p-lg-0">

            <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Courses</a>
            <a href="#" class="nav-item nav-link">Teachers</a>
            <a href="#" class="nav-item nav-link">Contact</a>

        </div>

        <a href="#" class="btn btn-light rounded-pill py-2 px-4 d-none d-lg-block">

            Free Trial

        </a>

    </div>

</nav>
