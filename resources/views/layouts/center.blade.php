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
    <hr class="title-ruler">
        @yield('content-mid')
</div>
@endsection