<?php

namespace TravelPlanner\Repositories;

use DB;
use Illuminate\Database\Eloquent\Model;
use TravelPlanner\Extensions\Interfaces\Repositories\RepositoryInterface;

/**
 * The Abstract Repository provides default implementations of the methods defined
 * in the base repository interface. These simply delegate static function calls
 * to the right eloquent model based on the $model.
 */
abstract class AbstractRepository implements RepositoryInterface
{

    protected $model;

    public function get($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function first($columns = array('*'))
    {
        return $this->model->first($columns);
    }

    public function firstOrFail($columns = array('*'))
    {
        return $this->model->firstOrFail($columns);
    }

    public function last($columns = array('*'))
    {
        return $this->model->last($columns);
    }

    public function newInstance(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            return $this->model->create($attributes);
        });
    }

    public function firstOrCreate(array $attributes, array $values = [])
    {
        return DB::transaction(function () use ($attributes, $values) {
            return $this->model->firstOrCreate($attributes, $values);
        });
    }

    public function save(Model $model)
    {
        return DB::transaction(function () use ($model) {
            $model->save();
            return $model;
        });
    }

    public function update(Model $model, array $attributes = [])
    {
        return DB::transaction(function () use ($model, $attributes) {
            $model->update($attributes);
            return $model;
        });
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return DB::transaction(function () use ($attributes) {
            return $this->model->updateOrCreate($attributes, $values);
        });
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function deleteAll()
    {
        return $this->model->delete();
    }

}
