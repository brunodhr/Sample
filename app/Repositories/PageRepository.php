<?php 

namespace App\Repositories;

use App\Models\Page;

class PageRepository extends BaseRepository 
{
	protected $model;

	/**
	 * Cria uma nova instancia de PageRepository
	 * @param Page $model 
	 */
	public function __construct(Page $model)
	{
		$this->model = $model;
	}

	/**
	 * Retorna um registro ou mostra página 404
	 * @param  string $column 
	 * @param  mixed $value  
	 * @return App\Models\Page         
	 */
	public function findOrFailBy($column, $value) 
	{
		return $this->model
				->where($column, '=', $value)
				->where('status', '=', 'PUBLISHED')
				->firstOrFail();
	}

}