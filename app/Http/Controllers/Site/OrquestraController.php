<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Models\DepoimentosOrquestra;
use App\Models\Banner;
use App\Models\Position;

class OrquestraController extends Controller
{

	protected $repositoryPost;

	/**
	 * Cria uma nova instância de PostController
	 * @param PostRepository $repositoryPost 
	 */
    public function __construct(PostRepository $repositoryPost) 
    {
    	$this->repositoryPost = $repositoryPost;
    }

    public function index()
    {
        $depoimentos = DepoimentosOrquestra::all();
        $position = Position::where('slug', 'banner-orquestra')->first();
        $banner = Banner::where('position_id', $position->id)->first();
        return view('site.orquestra.index', compact('depoimentos','banner'));
    }
    /**
     * Exibe uma notícia
     * @param  string $slug 
     * @return \Illuminate\Http\Response       
     */
}
