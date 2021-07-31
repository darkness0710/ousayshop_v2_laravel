<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quản lí OusayShop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="https://www.dropzonejs.com/css/dropzone.css" rel="stylesheet">
    <script src="https://www.dropzonejs.com/js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>
<body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('admin.layouts.elements.nav')
            
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                @include('admin.layouts.elements.brand_logo')
                <!-- Sidebar -->
                @include('admin.layouts.elements.sidebar')
            </aside>
            @yield('content')
            
            @include('admin.layouts.structures.footer')
        </div>
       
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</body>
</html>
