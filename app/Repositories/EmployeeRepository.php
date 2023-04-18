<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/15/2023
 * Time: 11:15 PM
 */

namespace App\Repositories;


use App\Models\Employee;

class EmployeeRepository extends CoreRepository
{
public function __construct()
{
    parent::__construct(Employee::class);
}
}