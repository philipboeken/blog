<nav class="navbar is-info is-fixed-top">
    <div class="navbar-brand">
        @guest
            <a class="navbar-item" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            @else
                <a class="navbar-item" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @endguest

                <div class="navbar-burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        @auth
            <div class="navbar-start">
                <a class="navbar-item" href="/posts">Posts</a>
                <a class="navbar-item" href="/agenda">Agenda</a>
                <a class="navbar-item" href="/contacts">Contacts</a>
                <a class="navbar-item" href="/files">Files</a>
            </div>
        @endauth
        <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ route('login') }}">Login</a>
                <a class="navbar-item" href="{{ route('register') }}">Register</a>
            @else
                <div class="navbar-item is-hidden-mobile">
                    <form method="GET" action="/search">
                        <div class="field has-addons">
                            <p class="control has-icons-right">
                                <input class="input" name="search" type="text"
                                       placeholder="Zoeken">
                                <span class="icon is-small is-right">
                                    <i class="fa fa-search"></i>
                                </span>
                            </p>
                            <p class="control">
                                <button class="button is-static">
                                    Zoek
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                        {{ Auth::user()->first_name }}
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ route('home') }}">
                            Home
                        </a>
                        <a class="navbar-item" href="/account">
                            Account
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
