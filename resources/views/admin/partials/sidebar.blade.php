<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('img/BabyCare.png') }}" alt="Baby Care Logo"  style="opacity: .8">
        <span class="brand-text font-weight-light">.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/User.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Admin' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Manajemen Produk -->
                <li class="nav-item {{ request()->routeIs('admin.kategori.*', 'admin.produks.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.kategori.*', 'admin.produks.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Manajemen Produk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.produks.index') }}" class="nav-link {{ request()->routeIs('admin.produks.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manajemen Order -->
                <li class="nav-item {{ request()->routeIs('admin.orders.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Manajemen Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.payments') }}" class="nav-link {{ request()->routeIs('admin.orders.payments') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manajemen Customer -->
                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manajemen Customer</p>
                    </a>
                </li>

                <!-- Laporan -->
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.reports.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Laporan</p>
                    </a>
                </li> --}}

                <!-- Separator -->
                <li class="nav-header">PENGATURAN</li>

                <!-- Profile -->
                <li class="nav-item">
                    <a href="{{ route('admin.profile.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <!-- Kembali ke Website -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" s>
                        <i class="nav-icon fas fa-external-link-alt"></i>
                        <p>Kembali ke Beranda</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
