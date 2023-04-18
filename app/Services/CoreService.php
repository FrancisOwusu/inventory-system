<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:33 PM
 */

namespace App\Services;


use App\Repositories\ICoreRepository;

abstract class CoreService implements ICoreService
{
    protected $repository;

    public function __construct(ICoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->repository->findAll();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->repository->find($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        return $this->repository->store($data);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
        $resource = $this->repository->find($id);
        if($resource){
            $resource->update($data);
        }
        return $resource->refresh();
    }

    public function delete($id, $data=null): bool
    {
        // TODO: Implement delete() method.
        $resource = $this->repository->find($id, $data);

        if (!$resource) {
            return false;
        }

        $resource->delete();

        return true;
    }

    public function model()
    {
        // TODO: Implement model() method.
        return $this->repository->model();
    }
}