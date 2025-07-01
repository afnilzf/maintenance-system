<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/polman.png') }}">
    <title>HRIS</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/style.min.css') }}">

    @include('auth.partials.login-style')
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="container">
        <div class="left-section">
            <div class="logo">
                <img src="{{ asset('theme/images/polman.png') }}" alt="Logo">
            </div>
            <div class="illustration">
                <img src="{{ asset('theme/images/vector.png') }}" alt="Ilustrasi">
            </div>
            <div class="shape">
                <!-- <img src="{{ asset('theme/images/newShape.png') }}" alt="Shape"> -->
            </div>
        </div>
        <div class="right-section">
            <div class="logo2">
                <img src="{{ asset('theme/images/polman.png') }}" alt="Logo">
            </div>
            <h2 style="margin:0;">Login to your Account</h2>
            <p style="margin-top:6px;">Please enter your details</p>

            <form class="mt-4" action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" id="username" class="form-control" required>

                <label for="password">Password</label>
                <div style="position: relative; display: flex;">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                    <i id="togglePassword" class="fa fa-eye" style="position: absolute; right: 10px; cursor: pointer;"></i>
                </div>

                <button type="submit">Login</button>
            </form>

            <div class="footer" style="text-align: center; font-size: 14px; margin-top: auto; padding: 10px 0;">
                &copy; {{ now()->year }} Sistem Penjadwalan Perawatan Preventif &middot; {{ config('app.version', '1.0.0') }}

                <b>[SERVER: DEVELOPMENT]</b>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="{{ asset('admin-assets/assets/libs/jquery/dist/jquery.min.js') }}"></script> -->
    <script src="{{ asset('admin-assets/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin-assets/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{ asset('admin-assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin-assets/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin-assets/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <!-- <script src="{{ asset('admin-assets/dist/js/pages/calendar/cal-init.js')}}"></script> -->
    <script src="{{ asset('admin-assets/dist/js/pages/calendar/cal-init.js') }}?v={{ time() }}"></script>

    <script src="{{ asset('admin-assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('admin-assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            const password = document.getElementById("password");
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>