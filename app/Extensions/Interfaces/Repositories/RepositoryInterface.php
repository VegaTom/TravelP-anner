<?php

namespace TravelPlanner\Extensions\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * RepositoryInterface provides the standard functions to be expected of ANY
 * repository.
 */
interface RepositoryInterface
{

    public function get($columns = array('*'));

    public function find($id, $columns = array('*'));

    public function findOrFail($id, $columns = array('*'));

    public function first($columns = array('*'));

    public function firstOrFail($columns = array('*'));

    public function last($columns = array('*'));

    public function newInstance(array $attributes = []);

    public function create(array $attributes);

    public function firstOrCreate(array $attributes, array $values = []);

    public function save(Model $model);

    public function update(Model $model, array $attributes = []);

    public function updateOrCreate(array $attributes, array $values = []);

    public function delete(Model $model);

    public function deleteAll();

}
