<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Schema; //Required for handling large size strings. [MN - 11.06.2020]

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
        //Need to set default string length to 191 for some strange reason while running migration. [MN - 11.06.2020]
        //Schema::defaultStringLength(191);
    }
}
