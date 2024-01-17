<?php

namespace App\Models;

use App\Utils\Validators\EmployeeValidator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use EmployeeValidator;
    public $guarded = ['id'];
}
