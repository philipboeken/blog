<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('_navigation')
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        @yield('title')
                    </h1>
                    <h2 class="subtitle">
                        @yield('subtitle')
                    </h2>
                </div>
            </div>
        </section>
        <hr>
        <div class="page-content">
            @yield('content')
        </div>
        <hr>
        @include('_footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
