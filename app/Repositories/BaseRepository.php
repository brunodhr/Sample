<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;

/**
 * Class BaseRepository.
 */
abstract class BaseRepository
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function findOrFailBy($column, $value)
    {
        return $this->model
            ->where($column, '=' ,$value)
            ->firstOrFail();
    }

    public function create(array $data = [])
    {

        return $this->model->create($data);
    }

}