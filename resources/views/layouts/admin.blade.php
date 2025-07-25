<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" sizes="16x16" href="{{ asset('theme/images/iconpolman.ico') }}">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/extra-libs/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/libs/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/libs/fullcalendar/dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/hris.css') }}">
    @stack('styles')
</head>
<!-- @push('scripts')
<script>
    document.getElementById('repaired_by')?.addEventListener('change', function() {
        console.log('tes')
        const sektor = this.options[this.selectedIndex].getAttribute('data-sektor');
        document.getElementById('sektor').value = sektor || '';
    });
</script>
@endpush -->
<!-- @stack('scripts') -->

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <!-- Topbar Header -->
        @include('partials.admin-navbar')

        <!-- Sidebar -->
        @include('partials.admin-sidebar')

        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Footer -->
            <footer class="footer text-center text-muted">
                &copy; {{ now()->year }} Sistem Penjadwalan Perawatan Preventif &middot; {{ config('app.version', '1.0.0') }}

                <b>[SERVER: DEVELOPMENT]</b>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
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
    @stack('scripts')

    @yield('scripts')

</body>

</html>