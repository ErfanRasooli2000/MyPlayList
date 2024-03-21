<?php

namespace Modules\Album\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AlbumServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

//        Route::group(__DIR__ . '/../Routes/api.php');
    }
    public function boot()
    {

    }

}
