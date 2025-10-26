<?php

namespace App\Providers;

use App\Repositories\Cart\CartModelRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvier extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartModelRepository::class, function(){
            return new CartModelRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
