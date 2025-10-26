<?php

namespace App\Providers;

use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Dotenv\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
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
        $this->app->bind(CartRepository::class, function() {
            return new CartModelRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FacadesValidator::extend('filter', function($attribute, $value, $params){
                return ! in_array(strtolower($value), $params);
            },'The value is prohipted!');
            Paginator::useBootstrapFour();
    }
}
