<?php

namespace App\Models;

use App\Utils\Validators\ExpenseValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    use ExpenseValidator;
    protected $guarded= ['id'];
}
