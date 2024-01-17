<?php

namespace App\Models;

use App\Utils\Validators\CategoryValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use CategoryValidator;
    protected $guarded = ['id'];
}
