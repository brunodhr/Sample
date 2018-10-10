@extends('main')
@section('title', 'Home')

@section('content')
<!-- INICIO SLIDE SHOW -->
<div style="position:relative;">
    <div class="one-time mb-0">
    @foreach($banners as $banner)
        <div class="img-fluid" style="height: 75rem; background-image: url('{{ asset('/storage/'.$banner->image) }}'); background-position: 45% 40%; background-size: cover; position:relative">
            <div class="container">
                <div class="one-time-slide" style="position:absolute; top:50%; transform:translateY(-50%)">
                <h1 id="titulo-banner">{{$banner->name}}</h1>
                <p id="descricao-banner">{{$banner->description}}
                    <br>
                    @if($banner->label_link)
                        <a style="z-index:2;position:absolute;" class="px-5 mt-5 btn-banner" href="{{$banner->link}}">{{$banner->label_link}}</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div style="z-index:1;" class="pointers"></div>
</div>
<!-- FIM SLIDE SHOW -->
<!-- Inicio Sobre nós -->
<section style="background-color: #f5eee1;">
    <div class="container">
        <div class="row" style="padding-top:10rem;padding-bottom:10rem;">
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <img class="img-fluid apadrinhe-banner" src="img/banner-apadrinhe.png"/>
            </div>
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <span class="titulo-apadrinhe">Apadrinhe o Projeto</span>
                <p class="mt-5 descricao-apadrinhe">{{setting('site.apadrinhe')}}</p>
                <a style="text-decoration:none;" class="mt-5 px-5 btn-important2" href="/doeagora">Seja um Padrinho</a>
            </div>
        </div>
    </div>
</section>
<!-- Fim Sobre nós -->
<!-- Inicio Objetivos do Projeto -->
<section>
    <div class="container">
        <div class="row" style="padding-top:10rem;padding-bottom:10rem;">
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <span class="titulo-apadrinhe">Objetivos Do Projeto</span>
                <p class="mt-5 descricao-apadrinhe">{{setting('site.objetivo')}}</p>
                <a style="text-decoration:none;" class="mt-5 px-5 btn-important2" href="/noticias">+INFORMAÇÕES</a>
            </div>
            <div class="destaque col-xs-12 col-md-4 col-lg-6">
                <img class="img-fluid apadrinhe-banner" src="img/banner-objetivos.png"/>
            </div>
        </div>
    </div>
</section>
<!-- Fim Objetivos do Projeto -->
@php
    $meses = [
        '01' => 'JAN',
        '02' => 'FEV',
        '03' => 'MAR',
        '04' => 'ABR',
        '05' => 'MAI',
        '06' => 'JUN',
        '07' => 'JUL',
        '08' => 'AGO',
        '09' => 'SET',
        '10' => 'OUT',
        '11' => 'NOV',
        '12' => 'DEZ'
    ];
@endphp
<!-- Inicio Agenda -->
<section class="agenda-field">
    <div class="container justify-content-center">
        <h2 class="titulo-agenda text-center p-5">Agenda</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="mt-3" id="calendar-demo"></div>
            </div>
            <div class="col-md-8">
                <div class="d-flex flex-column col-md-12 justify-content-center">
                    @foreach($eventoagenda as $evento)
                    <div class="my-3 row card-agenda justify-content-around">
                        <div class="col-md-4 d-flex justify-content-center align-items-center row">
                            <div class="d-flex flex-column mr-1">
                                <span class="dia-evento">{{$evento->data->format('d')}}</span>
                                <span class="mesano-evento">{{$meses[$evento->data->format('m')]}} {{{$evento->data->format('Y')}}}</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="inf-agenda">
                                    {{ $evento->data->format('H') }}h{{ $evento->data->format('i') }} 
                                </span>
                
                                <span class="inf-local">
                                    {{$evento->local}} 
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <span class="inf-agenda">
                                {{ $evento->titulo}} 
                            </span>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <a href="agenda/{{ $evento->slug}} ">
                                <span class="button-info">
                                    +info 
                                </span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a style="text-decoration:none;" class="mt-3 mb-5 btn-important4 text-center" href="/agenda">VEJA A PROGRAMAÇÃO COMPLETA</a>
            </div>
        </div>
    </div>
</section>
<!-- Fim Agenda -->
<!-- Destaques -->
<section class="p-5" style="background-color:white;">
    <div class="container">
        <div class="row align-items-center mb-5 mt-5">
            <div class="col-xs-12 col-md-3 col-lg-2">
                <h2 class="nossos-parceiros text-center">Nossos Parceiros</h2>
            </div>
            @foreach($parceiros as $parceiro)
            <div class="logo-parceiros col-xs-12 col-md-3 col-lg-2">
                <a href="{{$parceiro->link}}">
                    <img class="logo-parceiros img-fluid" src="{{asset('/storage/'.$parceiro->foto)}}"/>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Fim Destaques -->
<!-- Inicio depoimentos -->
<div style="position:relative;">
    <div class="depoimentos mb-0">
        @foreach($depoimentos as $depoimento)
            <div class="" style="height: 45rem; background-image: url({{asset('/storage/'.$depoimento->banner)}}); background-position: 45% 40%; background-size: cover; position:relative">
                <div class="h-100 container">
                    <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <h1 class="w-100 text-center titulo-depoimentos">Depoimentos de nossos parceiros</h1>
                        </div>  
                        <div class="d-flex justify-content-center">
                            <p class="descricao-depoimentos text-center" style="max-width: 55%;">{{$depoimento->descricao}}</p>
                        </div>
                        <div class="d-flex align-items-center" style="width: 25%;">
                            <img class="foto-parceiro" src="{{asset('/storage/'.$depoimento->image)}}" alt="">
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
<!-- Fim Depoimentos -->
<hr>
@php
    $meses = [
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    ];
@endphp
<!-- Inicio Blog -->

<section style="margin-top:7rem;">
    <div class="container text-center">
        <h2 class="titulo-blog p-5">Blog</h2>
        <div class="postagens-blog">
            @foreach($publicacoes as $publicacao)
            <div class="">
                <a style="text-decoration:none;" href="blog/{{$publicacao->slug}}">
                    <div class="w-100 d-flex justify-content-center flex-column blog blog-box">
                        <div class='d-flex cover'>
                        <img class="banner-blog img-fluid" src="{{asset('/storage/'.$publicacao->image)}}" alt="">
                            <div class="img-overlay d-flex justify-content-center align-items-center">
                                <img src="{{asset('img/eye.png')}}">
                            </div>
                        </div>
                        <div class="p-5">
                            <p class="d-flex data-blog">{{$publicacao->created_at->format('d')}} de {{$meses[$publicacao->created_at->format('m')]}} de {{{$publicacao->created_at->format('Y')}}}</p>
                            <h2 class="titulo-blog2">{{$publicacao->title}}</h2>
                            <span class="descricao-blog">{{ preg_replace('/(<.*?>)|(&.*?;)/', '', \Illuminate\Support\Str::words($publicacao->excerpt, 10, "...")) }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
        <div class="col-12 py-5 d-flex justify-content-center align-items-center">
            <div class="pointers-blog setas"></div>
        </div>
    </div>
</section>


<!-- Fim Blog -->
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