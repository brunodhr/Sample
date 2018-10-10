@extends('voyager::bread.read')

@section('content')
    @parent

    <div class="page-content read container-fluid">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Adicionar imagens
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('admin.banners.store', $id) }}" method="POST" enctype="multipart/form-data"> 
                            {{ csrf_field() }}  
                            <div class="form-group">
                                <label>Banner</label>
                                <input type="file" name="imagens[]" multiple="multiple">
                            </div>
                            <button class="btn btn-primary">Enviar banners</button>
                        </form>

                        @if ($banners->isNotEmpty())
                            <hr>
                            <form action="{{ route('admin.banners.updateOrDelete', $id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                
                                <div class="banners">
                                    @foreach ($banners as $key => $banner)
                                        @if ($key % 4 == 0)
                                            <div class="row">
                                        @endif
                                        <div class="col-md-3">
                                            <input type="hidden" name="banners[{{ $key }}][id]" value="{{ $banner->id }}">

                                            <img src="{{ asset("storage/$banner->image") }}" style="width:300px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                            <div class="form-group">
                                                <label for="">Nome</label>
                                                <input type="text" class="form-control" name="banners[{{ $key }}][name]" value="@if (isset($banner->name) && !empty($banner->name)) {{ $banner->name }} @endif">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Descrição</label>
                                                <textarea class="form-control" name="banners[{{ $key }}][description]">@if (isset($banner->description) && !empty($banner->description)) {{ $banner->description }} @endif</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Link</label>
                                                <input class="form-control" name="banners[{{ $key }}][link]" value="@if (isset($banner->link) && !empty($banner->link)) {{ $banner->link }} @endif">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Label link</label>
                                                <input class="form-control" name="banners[{{ $key }}][label_link]" value="@if (isset($banner->label_link) && !empty($banner->label_link)) {{ $banner->label_link }} @endif">
                                            </div>
                                            <div class="form-group">
                                                @php $options = ['_self' => 'Mesma aba', '_blank' => 'Nova aba'] @endphp
                                                <label for="">Abrir em</label>
                                                <select class="form-control" name="banners[{{ $key }}][target]">
                                                    @foreach ($options as $indice => $value)
                                                        <option value="{{ $indice }}" @if ($banner->target == $indice) selected="selected" @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-danger" type="button" name="excluir-banner">Excluir banner</button>
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
        $('button[name=excluir-banner]').click(function(e) {
            $(this).parent().remove();
        });
    </script>
@stop
