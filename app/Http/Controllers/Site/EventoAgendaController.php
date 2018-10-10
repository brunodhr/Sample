<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventoAgenda;

class EventoAgendaController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $eventos = EventoAgenda::orderBy('data', 'asc');
        $eventos = $eventos->get();
        
        return view('site.agenda.index', compact('eventos'));
    }

    public function indexAjax(Request $request)
    {
        // dd($request->all());
        $eventos = EventoAgenda::orderBy('data', 'asc');
        $eventos = $eventos->get();
        
        return response()->json($eventos, 200);
    }

    public function interna($slug)
    {
        $evento = EventoAgenda::where('slug',$slug)->first();
        return view('site.agenda.show', compact('evento'));
    }
}
