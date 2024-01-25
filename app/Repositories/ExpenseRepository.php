<?php

namespace App\Repositories;

use App\Models\Expense;

class ExpenseRepository extends CoreRepository
{
public function __construct()
{
    parent::__construct(Expense::class);
}
}
