@extends('voyager::bread.edit-add')
@section('javascript')
    @parent
    <script>
      $(document).ready(function(){
        $('select[name=model]').on('change',function() {
          var value = $(this).val();
          if (value == "link") {
            $('select[name=foreign_key]').parent().hide();
            $('select[name=foreign_key]').prop( "disabled", true );
          }else{
            $.ajax({
              type: "GET",
              data: {model: $(this).val()},
              url: '{{route('admin.highlights.ajaxgetmodel')}}',
              success: function(response) {
                response = JSON.parse(response);
                $('select[name=foreign_key]').empty();
                $.each(response, function(index, element){
                  $('select[name=foreign_key]').append('<option value="'+index+'">'+element+'</option>');
                });
              }
            });
            $('select[name=foreign_key]').parent().show();
            $('select[name=foreign_key]').prop( "disabled", false );
          }
        });
        $('select[name=model]').change();
      });
    </script>
@stop
