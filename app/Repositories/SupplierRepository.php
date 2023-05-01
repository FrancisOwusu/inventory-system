<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/27/2023
 * Time: 6:09 AM
 */

namespace App\Repositories;


use App\Models\Supplier;

class SupplierRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Supplier::class);
    }
}