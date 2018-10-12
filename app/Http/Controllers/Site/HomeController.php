<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class HomeController extends Controller
{
    public function index()
    {
        $registros = Produto::where([
            'ativo' => 'S'
            ])->get();

        return view('site.home.index', compact('registros'));
    }

    public function produto($id = null)
    {
        if( !empty($id) ) {
            $registro = Produto::where([
                'id'    => $id,
                'ativo' => 'S'
                ])->first();

            if( !empty($registro) ) {
                return view('site.home.produto', compact('registro'));
            }
        }
        return redirect()->route('index');
    }
}
