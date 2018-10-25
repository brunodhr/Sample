@extends('layout')
@section('pagina_titulo', 'Login' )

@section('pagina_conteudo')

<div class="container">
    <div class="form-wrapper">
        <h4>Login</h4>
        <form class="form-box" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
                <div class="row">
                    <div class="input-field">
                        <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                        <!-- <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email') : null }}" >E-mail</label> -->
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="password" type="password" placeholder="Password" name="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
                        <!-- <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password') : null }}" >Senha</label> -->
                    </div>
                </div>
                <div class="row">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} id="remember" />
                    <label for="remember">Lembre-se de mim</label>
                </div>

                <div class="row">
                    <button type="submit" class="btn blue">
                        Entrar
                    </button>
                </div>

            <div class="row">
                <a class="" href="{{ url('/password/reset') }}">
                    Esqueceu sua senha?
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
