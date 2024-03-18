<?php

namespace App\Providers;

use App\Services\SearchService;
use App\Services\TelegramService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('telegram' , function (){
            return new TelegramService();
        });
        $this->app->bind("search" , function (){
            return new SearchService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
