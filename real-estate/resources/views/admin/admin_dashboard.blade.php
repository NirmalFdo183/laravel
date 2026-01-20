<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin Panel - Real Estate</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- Layout CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo2/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
<div class="main-wrapper">

    <!-- ================= SIDEBAR ================= -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                Real<span>Estate</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Web Apps</li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Email</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>

                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('admin.email.inbox') }}" class="nav-link">Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.email.read') }}" class="nav-link">Read</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.email.compose') }}" class="nav-link">Compose</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <!-- =============== END SIDEBAR =============== -->


    <!-- ================= PAGE WRAPPER ================= -->
    <div class="page-wrapper">

        <!-- Navbar -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>

            <div class="navbar-content">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <img class="wd-30 ht-30 rounded-circle"
                                 src="{{ asset('assets/images/faces/face1.jpg') }}"
                                 alt="profile">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->


        <!-- ================= PAGE CONTENT ================= -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- =============== END PAGE CONTENT =============== -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted">
                    © {{ date('Y') }} Real Estate Admin Panel
                </span>
            </div>
        </footer>

    </div>
    <!-- =============== END PAGE WRAPPER =============== -->

</div>

<!-- Core JS -->
<script src="{{ asset('assets/vendors/core/core.js') }}"></script>

<!-- Plugin JS -->
<script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>

<!-- Template JS -->
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>

</body>
</html>
