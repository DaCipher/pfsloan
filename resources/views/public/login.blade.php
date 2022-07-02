<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
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
</head>

<body class="login-body-bg vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex justify-content-center login-form-bg p-4 rounded">
        <form action="" class="login-form p-3" method="POST" style="min-width: 240px">
            @csrf

            <div class="mb-2 text-center text-white">
                <div class="mb-3">
                    <li class="bx bxs-key login-icon"></li>
                </div>

                <h4>LOGIN</h4>
                <p style="font-size: .7rem;">Please enter your credentials.</p>
            </div>
            @if(session()->get('error'))
            <div class="text-center">
                <span class="text-white bg-danger px-3 py-2 rounded" style="font-size: 0.7rem;">{{ session()->get('error')}}</span>
            </div>
            @endif
            <div class="mt-3">
                <label for="username">Username</label>
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username" value="{{ old('username') }}">
                    @error('username')
                    <span class="help-block text-danger" style="font-size: 0.7rem;">{{ $message}}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="username">
                    @error('password')
                    <span class="help-block text-danger" style="font-size: 0.7rem;">{{ $message}}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button type="submit" name="" id="" class="btn login-btn">Login</button>
                </div>
            </div>

        </form>
    </div>

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