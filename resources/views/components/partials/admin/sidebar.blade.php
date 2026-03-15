<section>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/images/mitra.svg') }}" id="logo" alt="Logo" class="navbar-brand-img brand-sm">
                {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg> --}}
                </a>
            </div>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fe fe-home"></i>
                        <span class="ml-3 item-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
            <span>Management</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Akun Pengguna</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                        <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.akun.admin') }}"><span class="ml-1 item-text">Admin</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.akun.staff') }}"><span class="ml-1 item-text">Staff</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.akun.wasit') }}"><span class="ml-1 item-text">Wasit</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.akun.pelanggan') }}"><span class="ml-1 item-text">Pelanggan</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('admin.lapangan') }}">
                        <i class="fe fe-layers fe-16"></i>
                        <span class="ml-3 item-text">Lapangan</span>
                        {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Transaksi</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('admin.pesanan') }}">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Pesanan</span>
                        {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Laporan</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('admin.laporan.transaksi') }}">
                        <i class="fe fe-file-text fe-16"></i>
                        <span class="ml-3 item-text">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('admin.laporan.pendapatan') }}">
                        <i class="fe fe-pie-chart fe-16"></i>
                        <span class="ml-3 item-text">Pendapatan</span>
                    </a>
                </li>
            </ul>
            {{-- <div class="btn-box w-100 mt-4 mb-1">
                <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
                </a>
            </div> --}}
        </nav>
    </aside>
</section>