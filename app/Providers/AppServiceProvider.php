<?php

namespace App\Providers;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Models\Supplier;
use App\Repositories\CategoryRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\SupplierRepository;
use App\Services\CategoryService;
use App\Services\EmployeeService;
use App\Services\InterfaceCoreService;
use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->when(CategoryController::class)
            ->needs(InterfaceCoreService::class)
            ->give(function ($app) {
                return new CategoryService(
                    $app->make(CategoryRepository::class)
                );
            });

        $this->app->when(EmployeeController::class)
            ->needs(InterfaceCoreService::class)
            ->give(function ($app) {
                return new EmployeeService(
                    $app->make(EmployeeRepository::class)
                );
            });
        $this->app->when(SupplierController::class)
            ->needs(InterfaceCoreService::class)
            ->give(function ($app) {
                return new SupplierService(
                    $app->make(SupplierRepository::class)
                );
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
