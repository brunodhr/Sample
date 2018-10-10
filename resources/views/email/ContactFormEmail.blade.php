@extends('email.main')
@section('content')
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">
            <div class="content">
                <table>
                    <tr>
                        <td>
                            <p>Nome: <strong> {{ $contato->name }} </strong></p>
                            <p>Email: <strong> {{ $contato->email }} </strong></p>
                            <p>Telefone: <strong> {{ $contato->telefone }} </strong></p>
                            <p>Mensagem: <strong> {{ $contato->mensagem }} </strong></p>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>
@endsection