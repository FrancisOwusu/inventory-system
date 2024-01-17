<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/27/2023
 * Time: 5:56 AM.
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
