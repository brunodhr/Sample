<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\GaleriaEvento;

class GaleriaEventoController extends Controller
{
    public function index(Request $request)
    {
        $eventos = Evento::paginate(9); // fazer paginação com o ajax usando o "carregar mais"
        // dd($eventos);
        return view('site.eventos.index', compact('eventos'));
    }

    public function show($id)
    {
        // Mostrar evento específico
        $galeria_evento = Evento::find($id)->images()->get();
        return view('site.eventos.show', compact('galeria_evento'));
    }

    public function slideshow()
    {
        // Mostrar evento específico
        $slideshow = Evento::with('images')->get();
        return view('site.eventos.index', compact('slideshow'));
    }

}
