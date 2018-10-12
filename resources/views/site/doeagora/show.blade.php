@extends('layout')
@section('title', 'Doe Agora')

@section('pagina_conteudo')
<ul class="nav nav-tabs justify-content-around">
    <li class="active"><a class="navs-title" data-toggle="tab" href="#credito">Credito</a></li>
    <li><a class="navs-title" data-toggle="tab" href="#boleto">Boleto</a></li>
</ul>

<div class="tab-content">
    <div id="credito" class="tab-pane fade in active">
        <section class="doacao-field container">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <span class="py-5 faca-sua-doacao">Formulário Cartão de Crédito</span>
                <form id="Form1" name="Form1" action="{{route('doeagora.pedido')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" id="TokenCard" name="TokenCard">
                <input type="text" id="HashCard" name="HashCard">
                <strong class="FormularioBase">Tipos da Doação</strong>
                    <div class="row">
                        <div class="mr-2 contribuicao-field d-flex align-items-center justify-content-start">
                            <input type="radio" name="tipocontribuicao" value="{{(session('doacao')->tipocontribuicao)}}"> <span class="pl-4 contribuicao-text"> Contribuição Única </span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="mr-2 selecionar-valor-field d-flex align-items-center justify-content-center">
                            <input type="radio" name="contribuicao" value="{{(session('doacao')->contribuicao)}}"> <span class="reais">R$</span> <span class="valor">30</span>
                        </div>
                    </div>
                    <strong class="FormularioBase">Dados do Comprador</strong>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">Nome<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->nome)}}" type="text" id="NomeComprador" name="NomeComprador" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">E-mail<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->email)}}" name="email" class="form-control form-field-slim">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label class="descricao-campos" for="exampleFormControlInput1">DDD<span style="color:red;">*</span></label>
                            <input value="31" name="numero1" id="DDDComprador" name="DDDComprador" maxlength="2" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="descricao-campos" for="exampleFormControlInput1">Telefone/Celular 01<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->numero1)}}" id="TelefoneComprador" name="TelefoneComprador" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-1">
                            <label class="descricao-campos" for="exampleFormControlInput1">DDD<span style="color:red;">*</span></label>
                            <input value="31" name="numero1" id="DDDComprador" name="DDDComprador" maxlength="2" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="descricao-campos" for="exampleFormControlInput1">Telefone/Celular 02</label>
                            <input value="{{(session('doacao')->numero2)}}" name="numero2" class="form-control form-field-slim">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">CPF<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->cpf)}}" type="text" id="CPFComprador" name="CPFComprador" maxlength="11" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">CEP<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->cep)}}" id="CEP" name="CEP" class="form-control form-field-slim">
                        </div>
                    </div>
                    <strong class="FormularioBase">Endereço do Cliente</strong>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">Cidade<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->cidade)}}" id="Cidade" name="Cidade" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">Estado<span style="color:red;">*</span></label>
                            <input class="form-control form-field-slim"  value="{{(session('doacao')->estado)}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">Bairro<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->bairro)}}" id="Bairro" name="Bairro" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="descricao-campos" for="exampleFormControlInput1">Logradouro ex.:Rua, Av.<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->logradouro)}}" id="Endereco" name="Endereco" class="form-control form-field-slim">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="descricao-campos" for="exampleFormControlInput1">Complemento</label>
                            <input value="{{(session('doacao')->complemento)}}" id="Complemento" name="Complemento" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="descricao-campos" for="exampleFormControlInput1">Número<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->numero)}}" id="Numero" name="Numero" class="form-control form-field-slim">
                        </div>
                    </div>
                    <strong class="FormularioBase">Dados do Cartão</strong>
                    <hr>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="descricao-campos" for="exampleFormControlInput1">Número do Cartão:<span style="color:red;">*</span></label>
                            <input type="text" id="NumeroCartao" name="NumeroCartao" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="hidden" id="BandeiraCartao" name="BandeiraCartao">
                            <div class="BandeiraCartao"></div>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="descricao-campos" for="exampleFormControlInput1">DV<span style="color:red;">*</span></label>
                            <input type="text" id="CVV" name="CVV" maxlength="3" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="descricao-campos" for="exampleFormControlInput1">Nome<span style="color:red;">*</span></label>
                            <input type="text" id="NomeCartao" name="NomeCartao" class="form-control form-field-slim">
                        </div>
                    </div>
                    <span>Validade do Cartão</span>
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label class="descricao-campos" for="exampleFormControlInput1">Mês</label>
                            <input type="text" id="MesValidade" name="MesValidade" maxlength="2" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="descricao-campos" for="exampleFormControlInput1">Ano<span style="color:red;">*</span></label>
                            <input type="text" id="AnoValidade" name="AnoValidade" maxlength="4" class="form-control form-field-slim">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="descricao-campos" for="exampleFormControlInput1">CPF do dono do Cartao<span style="color:red;">*</span></label>
                            <input value="{{(session('doacao')->cpf)}}" type="text" id="CPFCartao" name="CPFCartao" class="form-control form-field-slim">
                        </div>
                    </div>
                    <strong class="FormularioBase">Detalhes do Pagamento</strong>
                    <div class="row">
                        Quantidade de Parcelas
                        <select name="QtdParcelas" id="QtdParcelas">
                            <option value="">Selecione</option>
                        </select>
                        <input type="hidden" id="ValorParcelas" name="ValorParcelas" class="form-control form-field-slim">
                    </div>

                    <hr class="my-5">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <img src="img/pagseguro.png" alt="">
                        </div>
                        <div class="d-flex justify-content-end col-md-6">
                            <button class="ml-4 mt-3 button-doar" id="BotaoComprar" type="submit">PROSSEGUIR ></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<div>
    <div class="CartaoCredito"><div class="Titulo">Cartão de Crédito</div></div>
    <div class="Boleto"><div class="Titulo">Boleto</div></div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"> </script>
<script>
function iniciarSessao()
{
    var Url = '{{ route('doeagora.pagseguro') }}';
    axios.post(Url).then(res => {
        PagSeguroDirectPayment.setSessionId(res.data.id)
        console.log('Id da sessão: ',res.data.id);
        
    }).then(() => {
        listaMeiosPagamento();
    })
}
function listaMeiosPagamento()
{
    
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(data) {
            
            $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj){

                $('.CartaoCredito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });

            $('.Boleto').append("<div><img src=https://stc.pagseguro.uol.com.br/"+data.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path+">"+data.paymentMethods.BOLETO.name+"</div>");

            $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj){
                $('.Debito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });
        },
        complete: function(data){
            getTokenCard();
        }
   });
}

$('#NumeroCartao').on('keyup',function(){
    var NumeroCartao=$(this).val();
    var QtdCaracteres=NumeroCartao.length;

    if(QtdCaracteres == 6){
        PagSeguroDirectPayment.getBrand({
            cardBin: NumeroCartao,
            success: function(response) {
                var BandeiraImg=response.brand.name;
                $('.BandeiraCartao').html("<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+BandeiraImg+".png>")
                getParcelas(BandeiraImg);
            },
            error: function (response) {
                alert('Cartão não reconhecido');
                $('.BandeiraCartao').empty();
            }
        });
    }
});

function getParcelas(Bandeira)
{
    PagSeguroDirectPayment.getInstallments({
        amount: 500.00,
        maxInstallmentNoInterest: 2,
        brand: Bandeira,
        success: response => {
            $.each(response.installments, (i,obj) => {
                $.each(obj, (i2,obj2) => {
                    const NumberValue = obj2.installmentAmount;
                    const Number= `R$${NumberValue.toFixed(2).replace('.',',')}`;
                    const NumberParcelas = NumberValue.toFixed(2);
                    
                    $('#QtdParcelas').show().append(`<option value="${obj2.quantity}" ValorParcelas="${NumberParcelas}">${obj2.quantity} parcelas de "${Number}"</option>`);
                });
            });
        }
    });
}

$("#QtdParcelas").on('change',function(){
    const select = document.getElementById('QtdParcelas');
    const QtdParcelas = select.options[select.selectedIndex].value;
    const ValorParcelas = select.options[select.selectedIndex].getAttribute('ValorParcelas');
    
    $("#ValorParcelas").val(ValorParcelas);
    console.log('Quantidade de parcelas',QtdParcelas);
    console.log('Valor das parcelas',ValorParcelas);
});


$('#CVV').on('blur',function(){
    getTokenCard();
});

function getTokenCard()
{
    PagSeguroDirectPayment.createCardToken({
        cardNumber: $('#NumeroCartao').val(),
        brand: $('#BandeiraCartao').val(),
        cvv: $('#CVV').val(),
        expirationMonth: $('#MesValidade').val(),
        expirationYear: $('#AnoValidade').val(),
        // cardNumber: '4111111111111111',
        // brand: 'visa',
        // cvv: '123',
        // expirationMonth: '12',
        // expirationYear: '2030',
        success: function(response)
        {
            console.log('Token do cartão: ',response.card.token);
            $('#TokenCard').val(response.card.token);
        }
    });
}

$("#BotaoComprar").on('click',function(event){
    event.preventDefault();
    PagSeguroDirectPayment.onSenderHashReady(function(response){
        console.log('Hash :',response.senderHash);
        $("#HashCard").val(response.senderHash);
        $('#CVV').on('blur',function(){
            getTokenCard();
        });
        $('#Form1').submit();
    })
})


iniciarSessao();
</script>

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
                     ("erro" in res.data) {
                        alert('Não foi possível encontrar o CEP');
                    } else {
                        $("#rua").val(res.data.logradouro);
                        $("#bairro").val(res.data.bairro);
                        $("#cidade").val(res.data.localidade);
                        $("#estado").val(res.data.uf);
                    }
                });
        } else {
            $("#rua").val('');
            $("#bairro").val('');
            $("#cidade").val('');
            $("#estado").val('');   
        }
    })
});
</script>
@endsection