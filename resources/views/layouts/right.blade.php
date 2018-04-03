@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="hero is-small">
            <div class="hero-body">
                <h1 class="title">
                    @yield('title')
                </h1>
                <h2 class="subtitle">
                    @yield('subtitle')
                </h2>
            </div>
        </section>
        <hr>
        <div class="columns is-fullheight_">
            <div class="column is-main-content">
                @yield('content-mid')
            </div>
            <aside class="column is-3 is-sidebar-menu right-container">
                @yield('content-right')
            </aside>
        </div>
    </div>
@endsection