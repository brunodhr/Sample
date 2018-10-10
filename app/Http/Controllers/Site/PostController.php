<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
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

    public function index(Request $request)
    {
        // dd($request->all());
        $publicacoes = Post::query();
        if ($request->has('name')){
            $publicacoes->where('name','like', '%'.$request->name.'%');
        }
        $publicacoes = $publicacoes->get();
        return view('site.blog.index', compact('publicacoes'));
    }
    /**
     * Exibe uma notícia
     * @param  string $slug 
     * @return \Illuminate\Http\Response       
     */

    public function interna($slug)
    {
        $publicacao = Post::where('slug',$slug)->first();
        $ultimaspublicacoes = Post::orderBy('created_at', 'desc')->paginate(3);
        // dd($publicacao);
        return view('site.blog.show', compact('publicacao','ultimaspublicacoes'));
    }
}
