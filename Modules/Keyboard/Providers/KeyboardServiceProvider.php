<?php

namespace Modules\Keyboard\Providers;

use Illuminate\Support\ServiceProvider;

class KeyboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");
    }
}
