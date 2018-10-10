@extends('voyager::bread.read')

@section('content')
    @parent

    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Adicionar itens
                        </h3>
                    </div>

                    <div class="panel-body">
                        <button type="button" id="adicionarItem" class="btn btn-primary">Adicionar item</button>
                        <hr>
                        
                        <form action="{{ route('admin.accordion_item.storeOrUpdate', $id) }}" id="formAdicionarItem" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @php $key = 0; @endphp
                            <div id="itens">
                                @forelse ($itens as $item)
                                    <div class="item">
                                        <div class="form-group">
                                          <label class="control-label">Título</label>
                                          <input type="text" class="form-control" data-name="{{ 'itens.'.$key.'.title' }}" name="itens[{{ $key }}][title]" value="{{ $item->title }}">
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label">Descrição</label>
                                          <textarea class="form-control" data-name="{{ 'itens.'.$key.'.description' }}" name="itens[{{ $key }}][description]">{{ $item->description }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger excluirItem">Excluir item</button>

                                        <input type="hidden" name="itens[{{ $key }}][id]" value="{{ $item->id }}">
                                    </div>
                                    @php $key++ @endphp
                                @empty
                                    <div class="item">
                                        <div class="form-group">
                                            <label class="control-label">Título</label>
                                            <input type="text" class="form-control" data-name="{{ 'itens.'.$key.'.title' }}" name="itens[{{ $key }}][title]">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Descrição</label>
                                            <textarea class="form-control" data-name="{{ 'itens.'.$key.'.description' }}" name="itens[{{ $key }}][description]"></textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger excluirItem">Excluir item</button>

                                        <input type="hidden" name="itens[{{ $key }}][id]">
                                    </div>
                                @endforelse
                            </div>
                            <button class="btn btn-primary" id="salvar-itens">Salvar itens</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script>

        $('#adicionarItem').click(function(e) {
            let key = $('.item').length;
            $('#itens').append(`
                <div class="item">
                    <div class="form-group ">
                      <label class="control-label">Título</label>
                      <input type="text" class="form-control" data-name="itens.${key}.title" name="itens[${key}][title]">
                    </div>
                    <div class="form-group ">
                      <label class="control-label">Descrição</label>
                      <textarea class="form-control" data-name="itens.${key}.description" name="itens[${key}][description]"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger excluirItem">Excluir item</button>

                    <input type="hidden" name="itens[${key}][id]">
                </div>
            `);
        });

        $("#formAdicionarItem").submit(function(e){
          e.preventDefault();

          var url = $(this).attr('action');
          var form = $(this);
          var data = new FormData(this);

          $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function(){
              $("body").css("cursor", "progress");
              $("div").removeClass("has-error");
              $(".help-block").remove();
            },
            success: function(d){
              $("body").css("cursor", "auto");

              $.each(d.errors, function(key, row){

                $("[data-name='"+key+"']").parent().addClass("has-error");
                $("[data-name='"+key+"']").parent().append("<span class='help-block' style='color:#f96868'>"+row+"</span>")
              });
            },
            error: function(){
              $(form).unbind("submit").submit();
            }
          });
        });

        $(document).on('click', '.excluirItem', function(e) {
            $(this).parent().remove();
        });

    </script>    
@stop
