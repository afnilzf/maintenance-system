<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Components</span></li>

                <!-- Data Mesin & Komponen -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('machines.index') }}" aria-expanded="false" title="Data Mesin & Komponen">
                        <i class="fas fa-cog"></i>
                        <span class="hide-menu">Data Mesin & Komponen</span>
                    </a>
                </li>


                <!-- Jadwal Perawatan Preventif -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('jadwal.index') }}" aria-expanded="false">
                        <i class="fas fa-calendar"></i>
                        <span class="hide-menu">Jadwal Perawatan</span>
                    </a>
                </li>


                <!-- Pemeriksaan Mesin -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('pemeriksaan.index') }}" aria-expanded="false">
                        <i class="fas fa-clipboard-check"></i>
                        <span class="hide-menu">Pemeriksaan Mesin</span>
                    </a>
                </li>

                <!-- Perbaikan & Suku Cadang -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('perbaikan.index') }}" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">Perbaikan & Suku Cadang</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        <span class="hide-menu">Laporan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('laporan.mesin') }}" class="sidebar-link">
                                <span class="hide-menu">Data Mesin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporan.perawatan') }}" class="sidebar-link">
                                <span class="hide-menu">Perawatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporan.perbaikan') }}" class="sidebar-link">
                                <span class="hide-menu">Perbaikan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manajemen User (opsional) -->
                @if(Auth::user()->role === 'admin')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('user.index') }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Manajemen User</span>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>