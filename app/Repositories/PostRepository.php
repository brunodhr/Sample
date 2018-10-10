<?php 

namespace App\Repositories;

use TCG\Voyager\Models\Post;

class PostRepository extends BaseRepository 
{
	protected $model;

	/**
	 * Cria uma nova instancia de PostRepository
	 * @param Post $model 
	 */
	public function __construct(Post $model)
	{
		$this->model = $model;
	}

	/**
	 * Retorna um registro ou mostra página 404
	 * @param  string $column 
	 * @param  mixed $value  
	 * @return TCG\Voyager\Models\Post         
	 */
	public function findOrFailBy($column, $value) 
	{
		return $this->model
				->where($column, '=', $value)
				->where('status', '=', 'PUBLISHED')
				->firstOrFail();
	}

}