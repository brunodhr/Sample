<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\GaleriaEvento;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $publicacoes = Post::query();
        if ($request->has('name')){
            $publicacoes->where('name','like', '%'.$request->name.'%');
        }
        $publicacoes = $publicacoes->get();
        return view('site.blog.blog', compact('publicacoes'));
    }

    public function interna($slug)
    {
        $publicacao = Post::where('slug',$slug)->first();
        $ultimaspublicacoes = Post::orderBy('created_at', 'desc')->paginate(3);
        // dd($publicacao);
        return view('site.blog.blog-interna', compact('publicacao','ultimaspublicacoes'));
    }
}
