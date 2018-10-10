<div class="gallery">
    <div class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @php
                $active = 'active';
            @endphp
            @foreach ($midias as $key => $midia)
                <div class="item {{ $active }}">
                    @empty ($midia->image)
                        @php
                            parse_str( parse_url( $midia->youtube, PHP_URL_QUERY ), $youtube );
                        @endphp
                        @if (isset($youtube['v']))

                                <img src="https://img.youtube.com/vi/{{$youtube['v']}}/hqdefault.jpg">
                        @endif
                    @else
                        <img src="{{ asset("storage/$midia->image") }}" style="width:100%; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                    @endempty
                </div>
                @php
                    $active = '';
                @endphp
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
