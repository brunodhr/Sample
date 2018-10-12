@extends('layout')
@section('title', 'Pagamento')

@section('pagina_conteudo')

<section class="doacao-field container">
        @if(!empty(session('message')))
            <h2 class="{{ session('alertType') }} text-center" style="color:white;">{{ session('message') }}</h2>
        @endif
    <div class="d-flex align-items-center justify-content-center flex-column">
        <span class="py-5 faca-sua-doacao">PAGAMENTO</span>
        <form action="{{route('doeagora.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="mr-2 contribuicao-field d-flex align-items-center justify-content-start">
                    <input type="radio" name="tipocontribuicao" value="unica"> <span class="pl-4 contribuicao-text"> Contribuição Única </span>
                </div>
                <div class="contribuicao-field d-flex align-items-center justify-content-start">
                    <input type="radio" name="tipocontribuicao" value="mensal"> <span class="pl-4 contribuicao-text"> Contribuição Mensal </span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="mr-2 selecionar-valor-field d-flex align-items-center justify-content-center">
                    <input type="radio" name="contribuicao" value="30"> <span class="reais">R$</span> <span class="valor">30</span>
                </div>
                <div class="mr-2 selecionar-valor-field d-flex align-items-center justify-content-center">
                    <input type="radio" name="contribuicao" value="50"> <span class="reais">R$</span> <span class="valor">50</span>
                </div>
                <div class="mr-2 selecionar-valor-field d-flex align-items-center justify-content-center">
                    <input type="radio" name="contribuicao" value="80"> <span class="reais">R$</span> <span class="valor">80</span>
                </div>
            </div>
            <hr class="mt-5 mb-5">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Nome<span style="color:red;">*</span></label>
                    <input name="nome" class="form-control form-field-slim">
                    <small class="form-text invalid-feedback">{{$errors->first('name')}} </small>
                        @if($errors->has('nome'))
                            <span style="font-size:1.4rem;color:red;"> 
                                {{$errors->first('nome') }} 
                            </span>
                        @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">E-mail<span style="color:red;">*</span></label>
                    <input name="email" class="form-control form-field-slim">
                    @if($errors->has('email'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('email') }} 
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Telefone/Celular 01<span style="color:red;">*</span></label>
                    <input name="numero1" class="form-control form-field-slim">
                    @if($errors->has('numero1'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('numero1') }} 
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Telefone/Celular 02</label>
                    <input name="numero2" class="form-control form-field-slim">
                    @if($errors->has('numero2'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('numero2') }} 
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">CPF<span style="color:red;">*</span></label>
                    <input name="cpf" class="form-control form-field-slim">
                    @if($errors->has('cpf'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('cpf') }} 
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">CEP<span style="color:red;">*</span></label>
                    <input id="cep" name="cep" class="form-control form-field-slim">
                    @if($errors->has('cep'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('cep') }} 
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Cidade<span style="color:red;">*</span></label>
                    <input id="cidade" name="cidade" class="form-control form-field-slim">
                    @if($errors->has('cidade'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('cidade') }} 
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Estado<span style="color:red;">*</span></label>
                    <select style="height:57%" class="descricao-campos form-control form-field-slim" name="estado" id="estado">
                        <option class="form-control form-field-slim" value="AC">Acre</option>
                        <option class="form-control form-field-slim" value="AL">Alagoas</option>
                        <option class="form-control form-field-slim" value="AP">Amapá</option>
                        <option class="form-control form-field-slim" value="AM">Amazonas</option>
                        <option class="form-control form-field-slim" value="BA">Bahia</option>
                        <option class="form-control form-field-slim" value="CE">Ceará</option>
                        <option class="form-control form-field-slim" value="DF">Distrito Federal</option>
                        <option class="form-control form-field-slim" value="ES">Espírito Santo</option>
                        <option class="form-control form-field-slim" value="GO">Goiás</option>
                        <option class="form-control form-field-slim" value="MA">Maranhão</option>
                        <option class="form-control form-field-slim" value="MT">Mato Grosso</option>
                        <option class="form-control form-field-slim" value="MS">Mato Grosso do Sul</option>
                        <option class="form-control form-field-slim" value="MG">Minas Gerais</option>
                        <option class="form-control form-field-slim" value="PA">Pará</option>
                        <option class="form-control form-field-slim" value="PB">Paraíba</option>
                        <option class="form-control form-field-slim" value="PR">Paraná</option>
                        <option class="form-control form-field-slim" value="PE">Pernambuco</option>
                        <option class="form-control form-field-slim" value="PI">Piauí</option>
                        <option class="form-control form-field-slim" value="RJ">Rio de Janeiro</option>
                        <option class="form-control form-field-slim" value="RN">Rio Grande do Norte</option>
                        <option class="form-control form-field-slim" value="RS">Rio Grande do Sul</option>
                        <option class="form-control form-field-slim" value="RO">Rondônia</option>
                        <option class="form-control form-field-slim" value="RR">Roraima</option>
                        <option class="form-control form-field-slim" value="SC">Santa Catarina</option>
                        <option class="form-control form-field-slim" value="SP">São Paulo</option>
                        <option class="form-control form-field-slim" value="SE">Sergipe</option>
                        <option class="form-control form-field-slim" value="TO">Tocantins</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Bairro<span style="color:red;">*</span></label>
                    <input id="bairro" name="bairro" class="form-control form-field-slim">
                    @if($errors->has('bairro'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('bairro') }} 
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="descricao-campos" for="exampleFormControlInput1">Logradouro ex.:Rua, Av.<span style="color:red;">*</span></label>
                    <input id="logradouro" name="logradouro" class="form-control form-field-slim">
                    @if($errors->has('logradouro'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('logradouro') }} 
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-8">
                    <label class="descricao-campos" for="exampleFormControlInput1">Complemento</label>
                    <input id="complemento" name="complemento" class="form-control form-field-slim">
                    @if($errors->has('complemento'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('complemento') }} 
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="descricao-campos" for="exampleFormControlInput1">Número<span style="color:red;">*</span></label>
                    <input id="numero" name="numero" class="form-control form-field-slim">
                    @if($errors->has('numero'))
                        <span style="font-size:1.4rem;color:red;"> 
                            {{$errors->first('numero') }} 
                        </span>
                    @endif
                </div>
            </div>
            
            <hr class="my-5">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="img/pagseguro.png" alt="">
                </div>
                <div class="d-flex justify-content-end col-md-6">
                    <button class="ml-4 mt-3 button-doar" type="submit">PROSSEGUIR ></button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
<script>
$(document).ready(function(){

    $("input[name='numero1']").on('keyup', function() {
        if ($("input[name='numero1']").val().length == 15) {
            $("input[name='numero1']").mask('(00) 00000-0000');
        } else {
            $("input[name='numero1']").mask('(00) 0000-00000');
        }
    });
    $("input[name='numero2']").on('keyup', function() {
        if ($("input[name='numero2']").val().length == 15) {
            $("input[name='numero2']").mask('(00) 00000-0000');
        } else {
            $("input[name='numero2']").mask('(00) 0000-00000');
        }
    });

    $("input[name='cpf']").mask('000.000.000-00');
    $("input[name='cep']").mask('00000-000');

    $("input[name='cep']").keyup(function () {
        if ($(this).val().length == 9) {
            axios.get(`https://viacep.com.br/ws/${$(this).val()}/json/`)
                .then(res => {
                    console.log()
                    if ("erro" in res.data) {
                        alert('Não foi possível encontrar o CEP');
                    } else {
                        $("#logradouro").val(res.data.logradouro);
                        $("#bairro").val(res.data.bairro);
                        $("#cidade").val(res.data.localidade);
                        $("#estado").val(res.data.uf);
                    }
                });
        } else {
            $("#logradouro").val('');
            $("#bairro").val('');
            $("#cidade").val('');
            $("#estado").val('');   
        }
    })
});
</script>
@endsection