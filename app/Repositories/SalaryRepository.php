<?php

namespace App\Repositories;

use App\Models\Salary;

class SalaryRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Salary::class);
    }
}
