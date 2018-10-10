@extends('main')
@section('title', 'Contato')

@section('content')
<!-- Inicio Banner -->
<section style="background-color:#f7f3e5; height: 20rem;">
    <div class="d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="titulo-contato">Contato</h1>
        <p class="descricao-contato"><a class="descricao-contato" style="text-decoration:none;" href="/">Home</a> &raquo; Contato</p>
    </div>
</section>
<!-- Final Banner -->
<!-- Inicio Conteudo Esquerda -->
<section class="mb-0">
    <div class="container" style="margin-top:7.5rem; margin-bottom:3rem;">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
            @if(!empty(session('message')))
                <h2 style="color:green;font-size:2.5rem;font-weight:bold;" class="mb-5 text-center" style="color:white;">{{ session('message') }}</h2>
            @endif
                <h1 class="mb-5 titulo-informacoes">FALE CONOSCO</h1>
                <form action="{{route('contato.store')}}" method="POST" class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group col-md-12">
                        <label class="descricao-campos" for="exampleFormControlInput1">Nome<span style="color:red">*</span></label>
                        <input name="nome" type="text" class="form-control form-field-slim" placeholder="Nome">
                        <small class="form-text invalid-feedback">{{$errors->first('name')}} </small>
                            @if($errors->has('nome'))
                                <span style="font-size:1.4rem;color:red;"> 
                                    {{$errors->first('nome') }} 
                                </span>
                            @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label class="descricao-campos" for="exampleFormControlInput1">E-mail<span style="color:red">*</span></label>
                        <input name="email" type="email" class="form-control form-field-slim" placeholder="exemplo@exemplo.com">
                        @if($errors->has('email'))
                            <span style="font-size:1.4rem;color:red;"> 
                                {{$errors->first('email') }} 
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label class="descricao-campos" for="exampleFormControlInput1">Telefone<span style="color:red">*</span></label>
                        <input name="telefone" id="telefone" class="form-control form-field-slim" placeholder="(00)00000-0000">
                        @if($errors->has('telefone'))
                            <span style="font-size:1.4rem;color:red;"> 
                                {{$errors->first('telefone') }} 
                            </span>
                        @endif

                    </div>
                    <div class="form-group col-md-12">
                        <label class="descricao-campos" for="exampleFormControlTextarea1">Mensagem<span style="color:red">*</span></label>
                        <textarea name="mensagem" class="form-control form-field-contato" id="exampleFormControlTextarea1" rows="5"></textarea>
                        @if($errors->has('mensagem'))
                            <span style="font-size:1.4rem;color:red;"> 
                                {{$errors->first('mensagem') }} 
                            </span>
                        @endif
                    </div>
                    <button class="ml-4 mt-3 button-contato" type="submit">Enviar</button>
                </form>
            </div>
            
            
            <div class="col-md-12 col-lg-6">
                <div>
                    <h1 class="titulo-informacoes">MAIS INFORMAÇÕES</h1>
                    <span class="flex-column info-group">
                        <div>
                            <span class="label"><i class="icon-phone mt-4 mr-4 fa fa-phone" aria-hidden="true"></i></span>
                            <span class='telefone-informacoes'>{{setting('contato.telefone1')}}</span>
                        </div>
                        <div>
                            <span class="label"><i class="icon-envelope mt-4 mr-4 fa fa-envelope" aria-hidden="true"></i></span>
                            <span class='email-informacoes'>{{setting('contato.email')}}</span>
                        </div>
                        <div>
                            <span class="label"><i class="icon-envelope px-4 mt-4 mr-4 fas fa-map-marker-alt" aria-hidden="true"></i></span>
                            <span class='endereco-informacoes'>{{setting('contato.endereco')}}</span>
                        </div>
                    </span>
                </div>
                <div>
                    <h1 class="titulo-informacoes mt-5">SIGA NOS</h1>
                    <div class="row mt-4">    
                        <span class="facebook">
                            <a style="text-decoration:none;" href="{{setting('contato.facebook')}}" target="_blank">
                                <i class="icons-contato fab fa-facebook-f"></i>
                            </a>
                        </span>
                        <span class="instagram">
                            <a style="text-decoration:none;" href="{{setting('contato.instagram')}}" target="_blank">
                                <i class="icons-contato fab fa-instagram"></i>
                            </a>
                        </span>
                        <span class="linkedin">
                            <a style="text-decoration:none;" href="{{setting('contato.linkedin')}}" target="_blank">
                                <i class="icons-contato fab fa-linkedin-in"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
$(document).ready(function(){
    $("input[name='telefone']").on('keyup', function() {
        if ($("input[name='telefone']").val().length == 15) {
            $("input[name='telefone']").mask('(00) 00000-0000');
        } else {
            $("input[name='telefone']").mask('(00) 0000-00000');
        }
    });
});



</script>
@endsection