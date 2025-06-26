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
                        <i class="fas fa-tachometer-alt"></i>
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
                        <span class="hide-menu">Manajemen Mesin & Komponen</span>
                    </a>
                </li>

                <!-- Manajemen Suku Cadang -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-boxes"></i>
                        <span class="hide-menu">Manajemen Suku Cadang</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('spareparts.index') }}" class="sidebar-link">
                                <span class="hide-menu">Daftar Suku Cadang</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('spareparts.history') }}" class="sidebar-link">
                                <span class="hide-menu">Riwayat Penggunaan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('sparepart.requests-listrequests') }}" class="sidebar-link">
                                <span class="hide-menu">Daftar Pengajuan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false">
                        <i class="fas fa-calendar-check"></i>
                        <span class="hide-menu">Jadwal Perawatan</span>
                    </a>
                </li>

                <!-- Jadwal Perawatan Preventif -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('maintenance-requests.index') }}" aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        <span class="hide-menu">Pengajuan Perawatan</span>
                    </a>
                </li>



                <!-- Pemeriksaan Mesin -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('checklists.index') }}" aria-expanded="false">
                        <i class="fas fa-search"></i>
                        <span class="hide-menu">Pemeriksaan Mesin</span>
                    </a>
                </li>

                <!-- Perbaikan & Suku Cadang -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('repairs.index') }}" aria-expanded="false">
                        <i class="fas fa-wrench"></i>
                        <span class="hide-menu">Perbaikan Mesin</span>
                    </a>
                </li>

                <!-- Pergantian Mesin -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('replacements.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-sync-alt"></i>
                        <span class="hide-menu">Pergantian Suka Cadang</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="fas fa-chart-line"></i>
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
                                <span class="hide-menu">Laporan Perawatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporan.perbaikan') }}" class="sidebar-link">
                                <span class="hide-menu">Laporan Perbaikan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporan.penggantian') }}" class="sidebar-link">
                                <span class="hide-menu">Laporan Penggantian Suku Cadang</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manajemen User (opsional) -->
                @if(Auth::user()->role === 'admin')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('users.index') }}" aria-expanded="false">
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