<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ExpenseController;

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::middleware(['api'])->group(function () {
    Route::resource('employee',EmployeeController::class);
    Route::resource('supplier',SupplierController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('sub/products/{id}',[\App\Http\Controllers\Api\PosController::class,'getProductByCategory']);
    Route::get('carts/{id}',[\App\Http\Controllers\Api\CartController::class,'addToCart']);
    Route::get('cart/products',[\App\Http\Controllers\Api\CartController::class,'cartProducts']);
    Route::resource('expenses',ExpenseController::class);
    Route::resource('customers',\App\Http\Controllers\Api\CustomerController::class);
    Route::resource('salary',\App\Http\Controllers\Api\SalaryController::class);
    Route::post('salary/pay/{id}',[\App\Http\Controllers\Api\SalaryController::class,'paySalary']);
    Route::get('salary/view/{id}',[\App\Http\Controllers\Api\SalaryController::class,'viewSalary']);
    Route::post('stock/update/{id}',[\App\Http\Controllers\Api\ProductController::class,'updateStock']);
});


