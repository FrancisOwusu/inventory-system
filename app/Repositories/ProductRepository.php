<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }
}
