@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="columns is-fullheight_">
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
            <aside class="column is-3 is-sidebar-menu right-container">
                @yield('content-right')
            </aside>
        </div>
    </div>
@endsection