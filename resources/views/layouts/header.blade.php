<header id="fh5co-header-section" class="sticky-banner">
    <div class="container">
        <div class="nav-header">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
            <h1 id="fh5co-logo">
                <a href="{{ route('home') }}"><i class="icon-home"></i>1-N<span>West</span></a>
            </h1>
            <nav id="fh5co-menu-wrap" role="navigation">
                <ul class="sf-menu" id="fh5co-primary-menu">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="{{ Request::is('properties*') ? 'active' : '' }}">
                        <a href="{{ route('properties') }}" class="fh5co-sub-ddown">Apartments</a>
                        <ul class="fh5co-sub-menu">
                            <li><a href="{{ route('underConstruction') }}">Family</a></li>
                            <!-- <li><a href="{{ route('underConstruction') }}">CSS3 &amp; HTML5</a></li> -->
                            <!-- <li><a href="{{ route('underConstruction') }}">Angular JS</a></li> -->
                            <!-- <li><a href="{{ route('underConstruction') }}">Node JS</a></li> -->
                            <!-- <li><a href="{{ route('underConstruction') }}">Django &amp; Python</a></li> -->
                        </ul>
                    </li>
                    <li class="{{ Request::is('agent') ? 'active' : '' }}"><a href="{{ route('agent') }}">Staff</a></li>
                    <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('underConstruction') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('underConstruction') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </div>
</header>
