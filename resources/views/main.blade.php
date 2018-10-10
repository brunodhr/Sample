<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Sample | @yield('title')</title>
</head>
<body>

{!! menu('Principal', 'site.partials._navbar') !!}

@yield('content')

{!! menu('Principal', 'site.partials._footer') !!}
<script src="{{ asset('/js/app.js') }}"></script>

<script src="{{ asset('/js/custom.js') }}"></script>

<script src="{{ asset('/js/jquery.mask.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

@yield('js')
</body>
</html>