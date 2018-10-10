<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TCG\Voyager\Facades\Voyager;
use App\Models\Highlight;
use App\Models\Position;

class HomeController extends Controller
{
  public function index()
  {
      $highlights = Highlight::all();
      foreach ($highlights as $key => $highlight) {
        if ($highlight->model != 'link') {
          $model = Voyager::model($highlight->model)->where('id', $highlight->foreign_key)->first();
          if(!empty($model)){
            if(empty($highlight->title)){
              $highlights[$key]->title = $model->title;
            }
            if(empty($highlight->summary)){
              $highlights[$key]->summary = $model->excerpt;
            }
            if(empty($highlight->image)){
              $highlights[$key]->image = $model->image;
            }
          }
          // $highlights[$key]->model_attributes = $model;
        }
      }

      $slide = Position::where('slug', 'slideshow')->first();
      $contato = Position::where('slug', 'contato')->first();
      $cliente = Position::where('slug', 'cliente')->first();

      return view('admin.home.index', [
        'highlights' => $highlights,
        'slide'      => $slide,
        'contato'    => $contato,
        'cliente'    => $cliente
      ]);
  }
}
