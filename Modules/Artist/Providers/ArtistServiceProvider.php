<?php

namespace Modules\Artist\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ArtistServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(ArtistRepositoryServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        Route::prefix("api/v1/artist")->group(__DIR__ . "/../Routes/api.php");

    }

    public function boot()
    {

    }
}
