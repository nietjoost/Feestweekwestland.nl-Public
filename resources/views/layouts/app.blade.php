<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('key')">
    <meta property='og:image' content="@yield('image')" />
    <link rel="image_src" href="@yield('image')" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/font-awesome.min') }}" rel="stylesheet">
    <link href="{{ asset('lib/fonts/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('/img/static/icon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('/img/static/icon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/img/static/icon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/img/static/icon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/img/static/icon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('/img/static/icon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('/img/static/icon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('/img/static/icon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/img/static/icon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('/img/static/icon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/img/static/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('/img/static/icon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/img/static/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('/img/static/icon/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ url('/img/static/icon/ms-icon-144x144.png') }}">
    <meta name="msapplication-TileColor" content="#46a748">
    <meta name="theme-color" content="#46a748">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="app">
        <nav class="navbar-top navbar-top-white">
            <div class="navbar-top-brand">
                <div>
                    <a href="{{ url('/') }}"><img  class="nav-img" src="{{ url('img/static/FeestweekwestlandLogo.png') }}" alt=""></a>
                </div>
            </div>
        </nav>
        <section id="main">
            @yield('content')
        </section>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/googleAnalytics.js') }}"></script>
</body>
</html>
