            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.user.index') ? 'active' : '' }}"
                                href="{{ route('admin.user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.kategori.index') ? 'active' : '' }}"
                                href="{{ route('admin.kategori.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-compass"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.produk.index') ? 'active' : '' }}"
                                href="{{ route('admin.produk.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck-loading"></i></div>
                                Produk
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.pesanan') ? 'active' : '' }}"
                                href="{{ route('admin.pesanan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-trailer"></i></div>
                                Pesanan
                            </a>
                            <a class="nav-link {{ request()->routeIs('admin.laporan') ? 'active' : '' }}"
                                href="{{ route('admin.laporan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
