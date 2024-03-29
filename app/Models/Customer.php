<?php

namespace App\Models;

use App\Utils\Validators\CustomerValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use CustomerValidator;
    protected $guarded =['id'];
}
