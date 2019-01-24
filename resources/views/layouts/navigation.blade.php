<nav class="navbar is-fixed-top">
    <div class="container">
        <div class="navbar-brand">
            @guest
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> @else
            <a class="navbar-item" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a> @endguest
            <div class="navbar-burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            @auth
            <div class="navbar-start">
                <div class="navbar-item is-hidden-desktop">
    @include('components.searchbar')
                </div>
                <a class="navbar-item" href="/posts">Posts</a>
                {{-- <a class="navbar-item" href="/agenda">Agenda</a> --}}
                <a class="navbar-item" href="/contacts">Contacten</a>
                <a class="navbar-item" href="/files">Bestanden</a>
            </div>
            @endauth
            <div class="navbar-end">
                @guest
                <a class="navbar-item" href="/login">Login</a>
                 @else
                <div class="navbar-item is-hidden-touch">
                    @include('components.searchbar')
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                        {{ Auth::user()->first_name }}
                    </a>
                    <div class="navbar-dropdown is-right">
                        <a class="navbar-item" href="/account">
                            Instellingen
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Uitloggen
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>