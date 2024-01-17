<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:33 PM.
 */

namespace App\Services;

use App\Repositories\ICoreRepository;

abstract class CoreService implements ICoreService
{
    /**
     * @var ICoreRepository
     */
    protected $repository;

    /**
     * CoreService constructor.
     */
    public function __construct(ICoreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @return mixed
     */
    public function model()
    {
        return $this->repository->model();
    }

    /**
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repository->store($data);
    }

    /**
     * @param null $data
     */
    public function delete($id, $data = null)
    {
        $resource = $this->repository->find($id, $data);

        if (!$resource) {
            return false;
        }

        $resource->delete();

        return true;
    }

    public function update($id, array $data)
    {
        $resource = $this->repository->find($id);

        if (!$resource) {
            return false;
        }

        $resource->update($data);

        return $resource->fresh();
    }

//    /**
//     * @return InterfaceCoreRepository
//     */
//    public function getRepository()
//    {
//        return $this->repository;
//    }
}
