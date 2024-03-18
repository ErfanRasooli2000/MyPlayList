<?php

namespace Modules\Song\Providers;

use Illuminate\Support\ServiceProvider;

class SongServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");
    }

    public function boot()
    {

    }
}
