<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/19/2023
 * Time: 12:22 PM.
 */

namespace App\Services;

use App\Repositories\ICoreRepository;

class SupplierService extends CoreService
{
    public function __construct(ICoreRepository $repository)
    {
        parent::__construct($repository);
    }
}
