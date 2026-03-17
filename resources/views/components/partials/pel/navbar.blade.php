<section>
    <nav class="topnav navbar navbar-light">
        <button type="button" class="btn-link navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar" id="sidebarCollapse">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        {{-- <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form> --}}
        <ul class="nav">
            @livewire('component.notification-badge')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2"><strong>{{ Auth::user()->name }}</strong></span>
                    <span class="avatar avatar-sm mt-2">
                        <img src="/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="nav-link pl-3 logout-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</section>