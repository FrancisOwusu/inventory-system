<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/23/2023
 * Time: 12:34 PM
 */

namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Category::class);
    }


}