<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Quản lí OusayShop') }}</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
<link rel="icon" href="{{ asset('images/favicon.png') }}">

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

</head>
<body>
<div id="app">
	<div style="margin-top: 100px"></div>
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>