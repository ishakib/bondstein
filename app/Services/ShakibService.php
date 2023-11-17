<?php

namespace App\Services;

use App\Models\Shakib;
use Illuminate\Database\Eloquent\Model;

class ShakibService
{
    public function __construct(Shakib $model)
    {
        $this->model = $model;
    }

    public function save($options = [])
    {
        $attributes = count($options) ? $options : request()->all();

        $this->model
            ->fill($this->getFillAble($attributes))
            ->save();

        return $this->model;
    }

    public function find($id)
    {
        return $this->model =  $this->model::query()->find($id);
    }

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }
}
