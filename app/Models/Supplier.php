<?php

namespace App\Models;

use App\Utils\Validators\SupplierValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory,SupplierValidator;

    protected $guarded =['id'];
}
