@extends('layout')
@section('pagina_titulo', 'COMPRAS' )

@section('pagina_conteudo')

<div class="container">
    <div class="d-flex flex-column">
        <h3 class="minhas-compras">Minhas compras</h3>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">{{ Session::get('mensagem-sucesso') }}</div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">{{ Session::get('mensagem-falha') }}</div>
        @endif
        <div class="box-comprasconcluidas">
            <h4 class="text-compras">Compras concluídas</h4>
            @forelse ($compras as $pedido)
                <h5 class="text-compras"> Pedido: {{ $pedido->id }} </h5>
                <h5 class="text-compras"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                <form method="POST" action="{{ route('carrinho.cancelar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                                <th class="text-compras">Produto</th>
                                <th class="text-compras">Valor</th>
                                <th class="text-compras">Desconto</th>
                                <th class="text-compras">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                            <tr>
                                <td class="center">
                                    @if($pedido_produto->status == 'PA')
                                        <p class="center">
                                            <input class="text-compras" type="checkbox" id="item-{{ $pedido_produto->id }}" name="id[]" value="{{ $pedido_produto->id }}" />
                                            <label class="text-compras" for="item-{{ $pedido_produto->id }}">Selecionar</label>
                                        </p>
                                    @else
                                        <strong class="text-compras red-text">CANCELADO</strong>
                                    @endif
                                </td>
                                <td>
                                    <img width="100" height="100" src="{{ asset($pedido_produto->produto->imagem) }}">
                                </td>
                                <td class="text-compras">{{ $pedido_produto->produto->nome }}</td>
                                <td class="text-compras">R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                                <td class="text-compras">R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                                <td class="text-compras">R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-compras"><strong>Total do pedido</strong></td>
                                <td class="text-compras">R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn-large red col l12 s12 m12 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cancelar itens selecionados">
                                        Cancelar
                                    </button>   
                                </td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            @empty
                <h5 class="center">
                    @if ($cancelados->count() > 0)
                        Neste momento não há nenhuma compra valida.
                    @else
                        Você ainda não fez nenhuma compra.
                    @endif
                </h5>
            @endforelse
        </div>
        <div class="box-comprascanceladas">
            <h4 class="text-compras">Compras canceladas</h4>
            @forelse ($cancelados as $pedido)
                <h5 class="text-compras"> Pedido: {{ $pedido->id }} </h5>
                <h5 class="text-compras"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                <h5 class="text-compras"> Cancelado em: {{ $pedido->updated_at->format('d/m/Y H:i') }} </h5>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-compras">Produto</th>
                            <th class="text-compras">Valor</th>
                            <th class="text-compras">Desconto</th>
                            <th class="text-compras">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                        <tr>
                            <td>
                                <img width="100" height="100" src="{{ asset($pedido_produto->produto->imagem) }}">
                            </td>
                            <td class="text-compras">{{ $pedido_produto->produto->nome }}</td>
                            <td class="text-compras">R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                            <td class="text-compras">R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                            
                            <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-compras"><strong>Total do pedido</strong></td>
                            <td class="text-compras">R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            @empty
                <h5 class="center text-compras">Nenhuma compra ainda foi cancelada.</h5>
            @endforelse
        </div>
    </div>

</div>

@endsection