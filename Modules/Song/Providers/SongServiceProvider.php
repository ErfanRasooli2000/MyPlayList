<?php

namespace Modules\Song\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SongServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(SongRepositoryServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        Route::prefix("api/v1/songs")
            ->group(__DIR__ . "/../routes/api.php");
    }

    public function boot()
    {

    }
}
