<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 10:55 PM
 */

namespace App\Repositories;


interface ICoreRepository
{

    public function findAll();

    public function find($id);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id, $data=null);

    public function model();

}