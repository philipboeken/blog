@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="columns is-fullheight">
            <div class="column is-main-content">
                <div class="hero is-small">
                    <div class="hero-body">
                        <h1 class="title">
                            @yield('title')
                        </h1>
                    </div>
                </div>
                <hr>
                @yield('content-mid')
            </div>
            <aside class="column is-2 is-sidebar-menu right-container">
                <div class="hero">
                    <div class="hero-body">
                        &nbsp
                    </div>
                </div>
                @yield('content-right')
            </aside>
        </div>
    </div>
@endsection