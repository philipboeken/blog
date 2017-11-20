@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="columns">
            <div class="column is-3 left-container">
                @yield('title-left')
            </div>
            <div class="column">
                <div class="hero-body">
                    <h1 class="title">
                        @yield('title')
                    </h1>
                    <h2 class="subtitle">
                        @yield('subtitle')
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <div class="page-content">
        <div class="columns">
            <div class="column is-3 left-container">
                @yield('content-left')
            </div>
            <div class="column">
                @yield('content-mid')
            </div>
            <div class="column is-3 is-1-touch"></div>
        </div>
    </div>
@endsection