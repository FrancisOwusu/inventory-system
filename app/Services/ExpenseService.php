<?php

namespace App\Services;

use App\Repositories\ICoreRepository;

class ExpenseService extends CoreService
{
public function __construct(ICoreRepository $repository)
{
    parent::__construct($repository);
}
}
