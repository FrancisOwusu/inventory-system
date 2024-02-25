<?php

namespace App\Models;

use App\Utils\Validators\ProductValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use ProductValidator;
    protected $table="products";
    protected $guarded= ['id'];

}
