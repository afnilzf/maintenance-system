<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="index.html">
                    <img src="{{ asset('theme/images/schema.png') }}" alt="" class="img-fluid">
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                <!-- Notification -->
                <!-- Contoh di navbar -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        @if (Auth::user()->unreadNotifications->count() > 0)
                        <span class="badge bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notifDropdown">
                        @forelse(Auth::user()->unreadNotifications->take(5) as $notif)
                        <li>
                            <a class="dropdown-item" href="{{ route('notifications.read', $notif->id) }}">
                                📅 {{ $notif->data['machine']}} {{ $notif->data['description']}}
                                <br><small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                            </a>
                        </li>


                        @empty
                        <li><span class="dropdown-item text-muted">Tidak ada notifikasi</span></li>
                        @endforelse
                        <li><a class="dropdown-item text-end text-primary" href="{{ route('notifications.read.all') }}">Tandai semua sudah dibaca</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center text-primary" href="{{ route('notifications.all') }}">Lihat Semua</a></li>
                    </ul>
                </li>

                <!-- End Notification -->
                <!-- ============================================================== -->

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                class="text-dark">{{ Auth::user()->username }}</span> <i data-feather="chevron-down"
                                class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"><i data-feather="power"
                                    class="svg-icon me-2 ms-1"></i>
                                Logout</a>
                        </form>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>