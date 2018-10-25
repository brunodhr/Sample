<!DOCTYPE html>
<html>
<head>
    <title>Loja virtual - @yield('pagina_titulo')</title>

    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Fontawesome Lib -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
</head>
<body>

@include('site.partials._navbar')

    @yield('pagina_conteudo')

    @if(!Auth::guest())
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
            {{ csrf_field() }}
        </form>
    @endif

@include('site.partials._footer')

    <!-- jQuery -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <!-- Jquery Mask -->
    <script src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('/js/slick.min.js') }}"></script>

    @yield('js')

</body>
</html>