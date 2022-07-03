<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> {{ $title }} - NiceAdmin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/css/sidebar-overlay.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('/admin/css/style.css') }}" rel="stylesheet">
    @livewireStyles()
    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('/admin/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <i class='bx bxs-user-circle fs-1'></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ ucfirst(auth()->user()->firstname) }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->firstname. " ". auth()->user()->lastname}}</h6>
                            @php
                            $role = ucwords(str_replace('_'," ", auth()->user()->role))
                            @endphp
                            <span>{{ $role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('password') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <form id="logoutForm" action="{{  route('logout') }}" method="get">
                            @csrf
                            <li id='logout'>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>
                        </form>



                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('applications') }}">
                    <i class="bi bi-menu-button-wide"></i><span>Application</span></i>
                </a>
            </li><!-- End Application Nav -->
            @if(auth()->user()->role === 'super_admin')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#accounts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accounts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('users')}}">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admins')}}">
                            <i class="bi bi-circle"></i><span>Admins</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- End Accounts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('site-settings') }}">
                    <i class="bi bi-bar-chart"></i><span>Site Settings</span>
                </a>
            </li><!-- End Site Settings Nav -->
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="bi bi-circle"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('password') }}">
                            <i class="bi bi-circle"></i><span>Password</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Settings Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <i class="bi bi-bar-chart"></i><span>Logout</span>
                </a>
            </li><!-- End Logout Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    {{ $slot }}

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @livewireScripts()
    <!-- Vendor JS Files -->
    <script src="{{ asset('/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/admin/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/tinymce/tinymce.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/admin/js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        document.getElementById('logout').addEventListener('click', () => document.getElementById('logoutForm').submit());
    </script>

</body>

</html>