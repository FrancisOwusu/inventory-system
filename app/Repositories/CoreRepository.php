<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 10:57 PM.
 */

namespace App\Repositories;

class CoreRepository implements ICoreRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
       return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function store(array $data)
    {
            return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        $resource = $this->model::find($id);
        if ($resource) {
            $resource->update($data);
        }

        return $resource->refresh();
    }

    public function delete($id, $data = null): bool
    {
        $resource = $this->model::find($id);
        if (!$resource) {
            return false;
        }
        $resource->delete();

        return true;
    }

    public function model()
    {
        return $this->model;
    }
}
