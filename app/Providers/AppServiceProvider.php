<?php

namespace App\Providers;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Repositories\CategoryRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\SupplierRepository;
use App\Services\CategoryService;
use App\Services\EmployeeService;
use App\Services\ICoreService;
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
            })
        ;

        $this->app->when(EmployeeController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new EmployeeService(
                    $app->make(EmployeeRepository::class)
                );
            })
        ;
        $this->app->when(SupplierController::class)
            ->needs(ICoreService::class)
            ->give(function ($app) {
                return new SupplierService(
                    $app->make(SupplierRepository::class)
                );
            })
        ;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }
}
