<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $attributes
     * @return Model
     */
    public function store(array $attributes) : Model
    {
        return $this->model->create($attributes);
    }
}

