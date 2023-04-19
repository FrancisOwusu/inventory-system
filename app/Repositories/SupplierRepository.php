<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/19/2023
 * Time: 12:26 PM
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