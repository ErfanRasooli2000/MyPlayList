<?php

namespace Modules\PlayList\Providers;

use Illuminate\Support\ServiceProvider;

class PlaylistServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(PlaylistRepositoryServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
