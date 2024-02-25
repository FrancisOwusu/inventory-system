<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Customer::class);
    }
}
