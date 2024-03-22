<?php

namespace Modules\Album\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AlbumServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(AlbumRepositoryServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        Route::prefix("api/v1/albums")
            ->group(__DIR__ . '/../Routes/api.php');
    }
}
