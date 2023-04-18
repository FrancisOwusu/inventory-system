<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:31 PM
 */

namespace App\Services;


interface ICoreService
{
    public function findAll();

    public function find($id);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id, $data=null);

    public function model();
}