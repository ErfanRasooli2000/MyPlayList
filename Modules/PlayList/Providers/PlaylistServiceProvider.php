<?php

namespace Modules\PlayList\Providers;

use Illuminate\Support\ServiceProvider;

class PlaylistServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
