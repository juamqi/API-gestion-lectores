<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Solo necesitas esto si estás configurando rutas manualmente.
        // Si no estás personalizando rutas, puedes omitirlo.
        Route::middleware('api')
             ->prefix('api')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
