<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\categoria;
class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $categorias = categoria::all();
            $view = with('categorias',$categorias);
        });
    }
}
