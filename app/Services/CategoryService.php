<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2023
 * Time: 8:54 PM.
 */

namespace App\Services;

use App\Repositories\ICoreRepository;

class CategoryService extends CoreService
{
    public function __construct(ICoreRepository $repository)
    {
        parent::__construct($repository);
    }
}
