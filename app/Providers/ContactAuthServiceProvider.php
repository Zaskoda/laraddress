<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ContactAuthService;

class ContactAuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContactAuthService::class, function ($app) {
            return new ContactAuthService();
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
