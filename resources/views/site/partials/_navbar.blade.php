<header>
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('index') }}" class="brand-logo">LOGO</a>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
                <div class="col-md-6">
                    <ul class="d-flex justify-content-end">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Entrar</a></li>
                            <li><a href="{{ url('/register') }}">Cadastre-se</a></li>
                        @else
                            <li><a href="{{ url('/doeagora') }}">Pagamento</a></li>
                            <li><a href="{{ route('carrinho.compras') }}">Minhas compras</a></li>
                            <li><a href="{{ route('carrinho.index') }}">Carrinho</a></li>
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                                    Olá {{ Auth::user()->name }}!<i class="material-icons right">arrow_drop_down</i>
                                </a>
                                <ul id="dropdown-user" class="dropdown-content">
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
@section('js')
<script>
$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('select').material_select();
});
</script>
@endsection