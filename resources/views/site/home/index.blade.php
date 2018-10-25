@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	<div class="row">
		<div style="max-width:1000px;position:relative;">
			<div class="one-time mb-0">
			@foreach($registros as $registro)
				<div class="col s12 m6 l4">
					<div class="card medium">
						<div class="card-image">
							<img src="{{ $registro->imagem }}">
						</div>
						<div class="card-content">
							<span class="card-title grey-text text-darken-4 truncate" title="{{ $registro->nome }}">{{ $registro->nome }}</span>
							<p>R$ {{ number_format($registro->valor, 2, ',', '.') }}</p>
						</div>
						<div class="card-action">
							<a class="blue-text" href="{{ route('produto', $registro->id) }}">Veja mais informações</a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
			<div class="pointers"></div>
		</div>
	</div>
</div>

@endsection
@section('js')
@section('js')
<script>
$(document).ready(function(){
	$('.one-time').slick({	
		dots:true,
		arrows:true,
		autoplay:false,
		speed:300,
		slidesToShow: 3,
		slidesToScroll: 1,
		appendArrows: $('.pointers'),
		nextArrow: "<img src='img/seta-modal-direita.png'>",
		prevArrow: "<img src='img/seta-modal-esquerda.png'>",
	});
});
</script>
@endsection