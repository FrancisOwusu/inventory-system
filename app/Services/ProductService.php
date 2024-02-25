<?php

namespace App\Services;

use App\Repositories\ICoreRepository;

class ProductService extends CoreService
{
    public function __construct(ICoreRepository $repository)
    {
        parent::__construct($repository);
    }
}
