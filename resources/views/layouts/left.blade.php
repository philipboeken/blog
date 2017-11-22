@extends('layouts.app')

@section('content')
    <div class="columns is-fullheight">
        <aside class="column is-2 is-sidebar-menu left-container">
            <div class="hero">
                <div class="hero-body">
                    &nbsp
                </div>
            </div>
            @yield('content-left')
        </aside>
        <div class="column is-main-content">
            <div class="hero is-small">
                <div class="hero-body">
                    <h1 class="title">
                        @yield('title')
                    </h1>
                    <h2 class="subtitle">
                        @yield('subtitle')
                    </h2>
                </div>
            </div>
            <hr>
            @yield('content-mid')
        </div>
    </div>
@endsection