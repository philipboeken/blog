@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="columns">
            <div class="column is-2 left-container">
                @yield('title-left')
            </div>
            <div class="column is-7">
                <div class="hero-body">
                    <h1 class="title">
                        @yield('title')
                    </h1>
                    <h2 class="subtitle">
                        @yield('subtitle')
                    </h2>
                </div>
            </div>
            <div class="column is-3 right-container">
                @yield('title-right')
            </div>
        </div>
    </section>
    <hr>
    <div class="page-content">
        <div class="columns">
            <div class="column is-2 left-container">
                @yield('content-left')
            </div>
            <div class="column">
                @yield('content-mid')
            </div>
            <div class="column is-3 right-container">
                @yield('content-right')
            </div>
        </div>
    </div>
@endsection