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
    <div class="columns">
        <div class="column">
            @yield('content-mid')
        </div>
    </div>
</div>
@endsection