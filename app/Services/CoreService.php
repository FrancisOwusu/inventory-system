<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:33 PM
 */

namespace App\Services;


use App\Repositories\InterfaceCoreRepository;
use PhpParser\Node\Expr\Cast\Bool_;

abstract class CoreService implements InterfaceCoreService
{
    /**
     * @var InterfaceCoreRepository
     */
    protected $repository;

    /**
     * CoreService constructor.
     * @param InterfaceCoreRepository $repository
     */
    public function __construct(InterfaceCoreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->repository->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->repository->find($id);
    }

    /**
     * @return mixed
     */
    public function model()
    {
        // TODO: Implement model() method.
        return $this->repository->model();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        // TODO: Implement store() method.
        return $this->repository->store($data);
    }

    /**
     * @param $id
     * @param null $data
     */
    public function delete($id, $data = null)
    {
        // TODO: Implement delete() method.
        $resource = $this->repository->find($id, $data);

        if (!$resource) {
            return false;
        }

        $resource->delete();

        return true;
    }

    /**
     * @param $id
     * @param array $data
     */
    public function update($id, array $data)
    {
        // TODO: Implement update() method.
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