@extends('layout')
@section('pagina_titulo', $registro->nome )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="produto-nome">{{ $registro->nome }}</h3>
            <div class="produto-box">
                <img class="img-fluid" data-caption="{{ $registro->nome }}" src="{{ asset($registro->imagem) }}" alt="{{ $registro->nome }}" title="{{ $registro->nome }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="produto-inf">
                <h4 class="produto-preco">Preço :  R$ {{ number_format($registro->valor, 2, ',', '.') }} </h4>
                <div class="produto-descricao">
                    {!! $registro->descricao !!}
                </div>
                <form method="POST" action="{{ route('carrinho.adicionar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $registro->id }}">
                    <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection