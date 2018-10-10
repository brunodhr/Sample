@extends('main')
@section('title', 'Home')

@section('content')
<div style="position:relative;">
    <div class="one-time mb-0">
        <div class="img-fluid" style="height: 75rem; background-image: url('{{asset('img/example-foto.png')}}'); background-position: 45% 40%; background-size: cover; position:relative">
            <div class="container">
                <div class="one-time-slide" style="position:absolute; top:50%; transform:translateY(-50%)">
                <h1 id="titulo-banner">titulo</h1>
                <p id="descricao-banner">descricao
                    <br>
                    <a style="z-index:2;position:absolute;" class="px-5 mt-5 btn-important" href="#">Teste</a>
                </div>
            </div>
        </div>
        <div class="img-fluid" style="height: 75rem; background-image: url('{{asset('img/example-foto.png')}}'); background-position: 45% 40%; background-size: cover; position:relative">
            <div class="container">
                <div class="one-time-slide" style="position:absolute; top:50%; transform:translateY(-50%)">
                <h1 id="titulo-banner">titulo</h1>
                <p id="descricao-banner">descricao
                    <br>
                    <a style="z-index:2;position:absolute;" class="px-5 mt-5 btn-important" href="#">Teste</a>
                </div>
            </div>
        </div>
        <div class="img-fluid" style="height: 75rem; background-image: url('{{asset('img/example-foto.png')}}'); background-position: 45% 40%; background-size: cover; position:relative">
            <div class="container">
                <div class="one-time-slide" style="position:absolute; top:50%; transform:translateY(-50%)">
                <h1 id="titulo-banner">titulo</h1>
                <p id="descricao-banner">descricao
                    <br>
                    <a style="z-index:2;position:absolute;" class="px-5 mt-5 btn-important" href="#">Teste</a>
                </div>
            </div>
        </div>
    </div>
    <div style="z-index:1;" class="pointers"></div>
</div>
<section style="background-color: #f5eee1;">
    <div class="container">
        <div class="row" style="padding-top:10rem;padding-bottom:10rem;">
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
            <!-- qlq imagem -->
            </div>
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <span class="titulo-apadrinhe">Teste</span>
                <p class="mt-5 descricao-apadrinhe"></p>
                <a style="text-decoration:none;" class="mt-5 px-5 btn-important" href="/doeagora">teste</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-success">
    <div class="container">
        <div class="row" style="padding-top:10rem;padding-bottom:10rem;">
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <span class="titulo-apadrinhe">teste</span>
                <p class="mt-5 descricao-apadrinhe">teste</p>
                <a style="text-decoration:none;" class="mt-5 px-5 btn-important" href="/noticias">teste</a>
            </div>
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <!-- qlq imagem -->
            </div>
        </div>
    </div>
</section>
<section class="p-5" style="background-color:white;">
    <div class="container">
        <div class="row align-items-center mb-5 mt-5">
            <div class="col-xs-12 col-md-3 col-lg-2">
                <h2 class="nossos-parceiros text-center">Nossos Parceiros</h2>
            </div>
            <div class="logo-parceiros col-xs-12 col-md-3 col-lg-2">
                <a href="#">
                    <img class="logo-parceiros img-fluid" src="{{asset('img/example-foto.png')}}"/>
                </a>
            </div>
            <div class="logo-parceiros col-xs-12 col-md-3 col-lg-2">
                <a href="#">
                    <img class="logo-parceiros img-fluid" src="{{asset('img/example-foto.png')}}"/>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Fim Destaques -->
<!-- Inicio depoimentos -->
<div style="position:relative;">
    <div class="depoimentos mb-0">
        @foreach($depoimentos as $depoimento)
            <div class="" style="height: 45rem; background-image: url({{asset('img/example-foto.png')}}); background-position: 45% 40%; background-size: cover; position:relative">
                <div class="h-100 container">
                    <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="w-100 text-center titulo-depoimentos">Depoimentos de nossos parceiros</h1>
                        </div>  
                        <div class="d-flex justify-content-center">
                            <p class="descricao-depoimentos text-center" style="max-width: 55%;">{{$depoimento->descricao}}</p>
                        </div>
                        <div class="d-flex align-items-center" style="width: 25%;">
                            <img class="foto-parceiro" src="{{asset('img/example-foto.png')}}" alt="">
                            <div class="ml-3 d-flex flex-column">
                                <span class="nome-parceiro">{{$depoimento->nome}}</span>
                                <span class="cargo-parceiro">{{$depoimento->cargo}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pointers-depoimentos"></div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.one-time').slick({
            dots:true,
            arrows:true,
            autoplay:false,
            infinite:true,
            speed:300,
            appendArrows: $('.pointers'),
            nextArrow: "<img src='img/seta-modal-direita.png'>",
            prevArrow: "<img src='img/seta-modal-esquerda.png'>",
        });
    });
    $(document).ready(function(){
        $('.depoimentos').slick({
            dots:false,
            arrows:true,
            autoplay:false,
            infinite:true,
            speed:300,
            appendArrows: $('.pointers-depoimentos'),
            nextArrow: "<img src='img/seta-depoimentos-right.png'>",
            prevArrow: "<img src='img/seta-depoimentos-left.png'>",
        });
    });
    $(document).ready(function(){
        $('.postagens-blog').slick({
            dots:false,
            arrows:true,
            autoplay:false,
            infinite:true,
            slidesToShow: 3,
            speed:300,
            appendArrows: $('.pointers-blog'),
            nextArrow: "<i class='fas fa-long-arrow-alt-right' aria-hidden='true'></i>",
            prevArrow: "<i class='fas fa-long-arrow-alt-left' aria-hidden='true'></i>",
        });
    });
    $('#calendar-demo').dcalendar();
    $('input').dcalendarpicker({
    format: 'dd-mm-yyyy'
});
</script>
@endsection