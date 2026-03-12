<section class="sticky-top"> 
    <nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
        <div class="container-fluid">
            <a class="navbar-brand mx-lg-1 mr-0" href="#">
            <img src="{{ asset('assets/images/mitra.svg') }}" id="logo" alt="Logo" class="navbar-brand-img brand-sm">
            {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
            </svg> --}}
            </a>
            {{-- <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button> --}}
            <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
            {{-- <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a> --}}
            <div class="d-flex justify-content-center w-100">
            <ul class="navbar-nav flex-row mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#hero">
                        <span class="ml-lg-2">Beranda</span>
                        {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#jadwal">
                        <span class="ml-lg-2">Jadwal</span>
                        {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">
                        <span class="ml-lg-2">Kontak</span>
                        {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                    </a>    
                </li>
            </ul>
            </div>
        </div>
        {{-- <div class="b-divider"></div> --}}
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item">
                <a class="btn btn-primary my-2" href="{{ route('login') }}">
                    Login
                </a>            
                <a class="btn btn-outline-primary my-2" href="{{ route('register') }}">
                    Register
                </a>            
            </li>
        </ul>
        </div>
    </nav>
</section>

