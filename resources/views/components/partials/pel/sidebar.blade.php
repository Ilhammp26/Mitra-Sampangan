<section>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('pel.beranda') }}">
                    <img src="{{ asset('assets/images/mitra.svg') }}" id="logo" alt="Logo" class="navbar-brand-img brand-sm">
                </a>
            </div>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('pel.beranda') }}">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Beranda</span>
                    </a>
                </li>
                {{-- <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('pel.beranda') }}">
                <i class="fe fe-list fe-16"></i>
                <span class="ml-3 item-text">Sewa Lapangan</span>
                </a>
                </li> --}}
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('pel.pesanan') }}">
                        <i class="fe fe-shopping-cart fe-16"></i>
                        <span class="ml-3 item-text">Pesanan Saya</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
</section>