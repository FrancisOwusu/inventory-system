<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:47 PM
 */

namespace App\Services;


use App\Repositories\ICoreRepository;
use App\Repositories\InterfaceCoreRepository;

class EmployeeService extends CoreService
{
    public function __construct(InterfaceCoreRepository $repository)
    {
        parent::__construct($repository);
    }
}