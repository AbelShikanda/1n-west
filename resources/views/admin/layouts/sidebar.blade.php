<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('admin/assets/images/logo.png') }}" alt="logo" class="w-50">
            </a>
        </div>

        <p class="text-muted nav-heading mt-4 mb-1"><span>Overview</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 show" id="dashboard">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('dashboard.index') }}"><span class="ml-1 item-text">Home</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1"><span>Property Components</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#properties" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-credit-card fe-16"></i>
                    <span class="ml-3 item-text">Properties</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 show" id="properties">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.properties.index') }}"><span class="ml-1 item-text">All Properties</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('property-categories.index') }}"><span class="ml-1 item-text">Categories</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('property-types.index') }}"><span class="ml-1 item-text">Types</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.property-images.index') }}"><span class="ml-1 item-text">Images</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1"><span>User Components</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Users</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 show" id="users">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.admins.index') }}"><span class="ml-1 item-text">Admins</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.admins.index', ['role' => 'staff']) }}"><span class="ml-1 item-text">Staff</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.users.index') }}"><span class="ml-1 item-text">Tenants</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.contacts.index') }}"><span class="ml-1 item-text">Contacts</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#access" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-lock fe-16"></i>
                    <span class="ml-3 item-text">Access Control</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 show" id="access">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('roles.index') }}"><span class="ml-1 item-text">Roles</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('permissions.index') }}"><span class="ml-1 item-text">Permissions</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1"><span>Blog Components</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#blog" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Blog</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 show" id="blog">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.blogs.index') }}"><span class="ml-1 item-text">Articles</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('blog-categories.index') }}"><span class="ml-1 item-text">Categories</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.blog-images.index') }}"><span class="ml-1 item-text">Images</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1"><span>Configuration</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">Site Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="fe fe-external-link fe-16"></i>
                    <span class="ml-3 item-text">View Public Site</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
