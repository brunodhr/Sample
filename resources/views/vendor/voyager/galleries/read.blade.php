@extends('voyager::bread.read')

@section('content')
    @parent

    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Adicionar Mídia
                        </h3>
                    </div>

                    <div class="panel-body">

                        <form action="{{ route('admin.gallery_midias.store', $id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#imagem" data-toggle="tab">Imagem</a></li>
                                <li><a href="#youtube" data-toggle="tab">Youtube</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="imagem" class="tab-pane active fade in">
                                    <div class="form-group">
                                        <label>Fotos</label>
                                        <input type="file" name="imagens[]" multiple="multiple">
                                    </div>
                                </div>
                                <div id="youtube" class="tab-pane fade">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="youtube" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Enviar Mídia</button>
                        </form>

                        @if ($midias->isNotEmpty())
                            <hr>
                            <form action="{{ route('admin.gallery_midias.updateOrDelete', $id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="images">
                                    @foreach ($midias as $key => $midia)
                                        @if ($key % 4 == 0)
                                            <div class="row">
                                        @endif
                                        <div class="col-md-3">
                                            <input type="hidden" name="gallery_midias[{{ $key }}][id]" value="{{ $midia->id }}">

                                            @empty ($midia->image)
                                                @php
                                                    parse_str( parse_url( $midia->youtube, PHP_URL_QUERY ), $youtube );
                                                @endphp
                                                @if (isset($youtube['v']))
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $youtube['v'] }}"></iframe>
                                                    </div>
                                                @endif
                                            @else
                                                <img src="{{ asset("storage/$midia->image") }}" style="width:100%; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                                <div class="form-group">
                                                    <label for="">Legenda</label>
                                                    <input type="text" class="form-control" name="gallery_midias[{{ $key }}][subtitle]" value="@if (isset($midia->subtitle) && !empty($midia->subtitle)) {{ $midia->subtitle }} @endif">
                                                </div>
                                            @endempty
                                            <button class="btn btn-danger" type="button" name="excluir-foto">Excluir Mídia</button>
                                        </div>

                                        @if ($key % 4 == 3)
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <button class="btn btn-primary">Salvar galeria</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    @parent

    <script>
        $('button[name=excluir-foto]').click(function(e) {
            $(this).parent().remove();
        });
    </script>
@stop
