<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;

class PageController extends Controller
{
	protected $repositoryPage;
    
    /**
     * Cria uma nova instancia de PageController
     * @param PageRepository $repositoryPage 
     */
    public function __construct(PageRepository $repositoryPage)
    {
    	$this->repositoryPage = $repositoryPage;
    }

    /**
     * Exibe uma página
     * @param  string $slug 
     * @return \Illuminate\Http\Response       
     */
    public function show($slug)
    {
    	$page = $this->repositoryPage->findOrFailBy('slug', $slug);
    	return view('site.pages.show', ['page' => $page]);
    }

}
