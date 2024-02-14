<?php

namespace App\Providers;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\SupplierController;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\ExpenseRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SalaryRepository;
use App\Repositories\SupplierRepository;
use App\Services\CategoryService;
use App\Services\CustomerService;
use App\Services\EmployeeService;
use App\Services\ExpenseService;
use App\Services\ICoreService;
use App\Services\ProductService;
use App\Services\SalaryService;
use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->when(CategoryController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new CategoryService(
                    $app->make(CategoryRepository::class)
                );
            });

        $this->app->when(EmployeeController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new EmployeeService(
                    $app->make(EmployeeRepository::class)
                );
            });
        $this->app->when(SupplierController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new SupplierService(
                    $app->make(SupplierRepository::class)
                );
            });
        $this->app->when(ProductController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new ProductService(
                    $app->make(ProductRepository::class)
                );
            });
        $this->app->when(ExpenseController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new ExpenseService($app->make(ExpenseRepository::class));
            });
        $this->app->when(CustomerController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new CustomerService($app->make(CustomerRepository::class));
            });

        $this->app->when(SalaryController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new SalaryService($app->make(SalaryRepository::class));
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }
}
