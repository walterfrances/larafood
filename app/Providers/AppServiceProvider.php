<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\Tenant;
use App\Observers\CategoryObserver;
use App\Observers\PlanObserver;
use App\Observers\TenantObserver;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class); // importar o Observer que cria e actualiza a URL automaticamente
        Tenant::observe(TenantObserver::class); // importar o Observer que cria e actualiza a URL e UUID automaticamente
        Category::observe(CategoryObserver::class); // importar o Observer que cria e actualiza a URL automaticamente
    }
}
