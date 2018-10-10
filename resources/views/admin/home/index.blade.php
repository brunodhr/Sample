@extends('voyager::master')

@section('page_title', 'Home Page')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-company"></i>
        Home Page
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
  <div class="clearfix container-fluid row">

    {{-- Slide --}}

    {{-- Destaques --}}
    @foreach ($highlights as $highlight)
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url({{ asset("storage/$highlight->image") }});">
          <div class="dimmer"></div>
          <div class="panel-content">
            <h4>{{$highlight->title}}</h4>
            <p>{{ str_limit($highlight->summary, 120) }}</p>
            <a href="{{ route('voyager.highlights.edit', $highlight->id) }}" class="btn btn-primary">Editar</a>
          </div>
        </div>
      </div>
    @endforeach



  </div>
@stop
