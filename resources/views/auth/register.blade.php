@extends('layout')
@section('pagina_titulo', 'Cadastro de usuário' )

@section('pagina_conteudo')
<div class="container">
    <div class="form-wrapper">
        <span>Cadastro de usuário</span>
        <form class="form-box" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-field">
                <div class="input-field">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="pt-5 validate {{ $errors->has('name') ? ' invalid' : '' }}" required autofocus>
                    <label for="name" data-error="{{ $errors->has('name') ? $errors->first('name') : null }}" >Nome</label>
                </div>
            </div>
            <div class="form-field">
                <div class="input-field">
                    <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email') : null }}" >E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="pt-5 validate {{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                </div>
            </div>
            <div class="form-field">
                <div class="input-field">
                    <input id="password" type="password" name="password" class="pt-5 validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
                    <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password') : null }}" >Senha</label>
                </div>
            </div>
            <div class="form-field">
                <div class="input-field">
                    <input id="password-confirm" type="password" name="password_confirmation" class="pt-5 validate {{ $errors->has('password-confirm') ? ' invalid' : '' }}" required>
                    <label for="password-confirm" data-error="{{ $errors->has('password-confirm') ? $errors->first('password-confirm') : null }}" >Confirmação de senha</label>
                </div>
            </div>
            <button type="submit" class="btn-cadastrar">
                Cadastrar
            </button>
        </form>
    </div>
</div>
@endsection
