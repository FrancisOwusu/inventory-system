<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/19/2023
 * Time: 10:47 AM
 */

namespace App\Services;


use App\Repositories\CoreRepository;
use App\Repositories\ICoreRepository;

class CrudHelper implements ICoreRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        $this->model::query();
    }

    /**
     * @param $id
     */
    public function find($id): Builder
    {
        // TODO: Implement find() method.
        return $this->model::find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        $resource = $this->model->find($id);
        if($resource){
            $resource->update($data);
        }
        return $resource->refresh();
    }

    public function delete($id, $data=null): bool
    {
        // TODO: Implement delete() method.
        $resource = $this->model->find($id);
        if(!$resource){
            return false;
        }
        $resource->delete();
        return true;
    }

    public function model()
    {
        // TODO: Implement model() method.
        return $this->model;
    }

}