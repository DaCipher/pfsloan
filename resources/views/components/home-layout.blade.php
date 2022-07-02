<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> {{ $title }} - Prime Financial Solution </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Livewire css -->
    @isset($wirecss)
    @livewireStyles()
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.js') }}"></script>
    @endisset
    <!-- =======================================================
  * Template Name: Company - v4.7.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="/"><span>PF </span>Solution</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="/" class="logo me-auto me-lg-0"><img src="{{ asset('/img/logo.png') }}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="/" class="active">Home</a></li>

                    <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('about')}}">About Us</a></li>
                            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                            <li><a href="{{ route('services') }}">Services</a></li>
                            <li><a href="{{ route('faq') }}">F.A.Q</a></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Loan</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('requirements') }}">Requirements</a></li>
                            <li><a href="{{ route('terms') }}">Terms</a></li>
                            <li><a href="{{ route('application') }}">Apply</a></li>
                        </ul>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            <!-- .navbar -->
            <div class="header-social-links d-flex ml-2">
                <a href="{{ route('application') }}" class="twitter px-3 btn">APPLY</i></a>

            </div>
        </div>
    </header>
    <!-- End Header -->

    {{ $slot }}

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3><span class="main-color">PF</span> SOLUTIONS</h3>
                        <p>
                            16 Washington Mewst, <br>
                            New York, NY 10003,<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 909 352 0381<br>
                            <strong>Email:</strong><span style="cursor:pointer" onclick="window.location.href='mailto:info@primefinancialsolution.com'"> info@primefinancialsolution.com</span><br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about' )}}">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('services') }}">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('terms') }}">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Quick Loan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Payday Loan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Bridge Loan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Home Equity Loan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Bussiness Loan</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Be the first to be informed about our latest updates</p>
                        <form action="" method="post" onsubmit="return false">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span class="main-color">PF</span> Solution</strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <img src="data:image/png;base64,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
                Vr0j+NJrZx9wZunOfNSr0HYBft1o8dNzi+Q0iX6X/VQ+2Ye353OJXWjjzAxq7rSQAe/S3afNuwsTX4gHRrDQB59F20jbsKr9hhx6oM4U3TxKdiLw5B2zK38R3G0VUU5VT6FkK0kRFQnmyzFijbYYfY/PEsjxAF1f8PHEpDB7VIa6wAAAAASUVORK5CYII=" alt="" srcset="" style="width: 270px;">
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Livewire script -->
    @isset($wirescript)
    @livewireScripts()
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
    </script>
    @endisset
    <!-- Vendor JS Files -->
    <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>