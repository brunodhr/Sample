<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Position;
use App\Models\Depoimentos;
use App\Models\Parceiro;
use App\Models\EventoAgenda;

class HomeController extends Controller
{
    public function index()
    {
        $depoimentos = Depoimentos::all();
        $publicacoes = Post::orderBy('created_at', 'desc')->limit(6)->get();
        $position = Position::where('name', 'slideshow')->first();
        $banners = Banner::where('position_id', $position->id)->orderBy('order')->get();
        $parceiros = Parceiro::orderBy('created_at', 'desc')->limit(5)->get();
        $eventoagenda = EventoAgenda::orderBy('created_at', 'asc')->paginate(3);
        return view('site.home.index', compact('publicacoes', 'banners','depoimentos','parceiros','eventoagenda'));
    }
}
