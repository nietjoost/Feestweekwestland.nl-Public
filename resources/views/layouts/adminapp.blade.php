<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
    <div class="app">
        <nav class="navbar-top">
            <div class="navbar-top-brand">
                <div>
                    <img src="{{ url('img/static/FeestweekwestlandLogo.png') }}" alt="">
                </div>
                <div class="">
                    <h3>Feestweekwestland</h3>
                </div>
            </div>
        </nav>
        <div class="section">
            <section id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="active">
                            @php
                                $breadcrumb = explode("/", Route::current()->uri);
                                $total = '';
                                foreach ($breadcrumb as $b) {
                                    $total = $total . $b . '/';
                                @endphp
                                    <a href="{{ url($total) }}">{{ $b }}</a> /
                            @php
                            }
                            @endphp
                        </li>
                    </ol>
                </div>
            </section>
            <section id="main">
                <div class="container">
                    <div class="row">
                        @if(Auth::check())
                        <div class="col-md-3">
                            <div class="list-group">
                                <a href="{{ url('admin') }}" class="list-group-item active main-color-bg">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                                </a>
                                <a href="{{ url('admin/dorp/') }}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Dorpen <span class="badge"></span></a>
                                <a href="{{ url('admin/evn/') }}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Evenementen <span class="badge"></span></a>
                                <a href="{{ url('admin/link/') }}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Linken <span class="badge"></span></a>
                            </div>
                            <div class="list-group">
                                <h5 href="" class="list-group-item active main-color-bg">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Acount
                                </h5>
                                <a href="{{ url('/') }}" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home website <span class="badge"></span></a>
                                <a href="{{ url('admin/settings/') }}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Settings <span class="badge"></span></a>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout <span class="badge"></span>
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="col-md-3">
                            <div class="list-group">
                                <a class="list-group-item active main-color-bg">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                                </a>
                                <a href="{{ url('login/') }}" class="list-group-item"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login <span class="badge"></span></a>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-9">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
