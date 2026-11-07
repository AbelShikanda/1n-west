<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted" action="{{ route('admin.properties.index') }}" method="GET">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" name="search"
            placeholder="Search properties..." aria-label="Search">
    </form>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="{{ route('home') }}" target="_blank" title="View public site">
                <span class="fe fe-external-link fe-16"></span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ avatar_url(auth('admin')->user()?->avatar, auth('admin')->user()?->name) }}"
                        alt="{{ auth('admin')->user()?->name ?? 'Admin' }}" class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <span class="dropdown-item-text text-muted small">
                    {{ auth('admin')->user()?->name ?? 'Administrator' }}
                </span>
                <a class="dropdown-item" href="{{ route('admin.admins.index') }}">Admins</a>
                <a class="dropdown-item" href="{{ route('settings.index') }}">Settings</a>
                <a class="dropdown-item" href="{{ route('adminLogout') }}"
                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
