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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

</head>
<body>
<div id="app">
    @include('layouts.navigation')
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
        <div class="columns">
            <div class="column is-2 left-container">
                @yield('left-container')
            </div>
            <div class="column is-7">
                @yield('content')
            </div>
            <div class="column is-3 right-container">
                @yield('right-container')
            </div>
        </div>
    </div>
    <hr>
    @include('layouts.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>
<script>
  $(function () {
    $('textarea.post').froalaEditor({
      charCounterCount: false,
      toolbarButtons: ['bold', 'italic', 'underline', '|', 'fontFamily', 'fontSize', 'color', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons','|', 'undo', 'redo']
    });
    $('textarea.comment').froalaEditor({
      charCounterMax: 140,
      toolbarButtons: ['bold', 'italic', 'underline', 'color', '|', 'emoticons']
    });
    $('div[style="position: absolute; bottom: 0px; left: 0px; z-index: 9999;"]').remove();
  });
</script>
</body>
</html>
