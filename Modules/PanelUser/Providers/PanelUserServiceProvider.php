<?php

namespace Modules\PanelUser\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\PanelUser\Database\Repositories\Contracts\PanelUserRepositoryInterface;
use Modules\PanelUser\Database\Repositories\Eloquents\PanelUserRepository;

class PanelUserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PanelUserRepositoryInterface::class , PanelUserRepository::class);

        $this->loadMigrationsFrom(__DIR__ . "/../Database/Migrations");

        Route::prefix("api/v1")
            ->group(__DIR__ . '/../Routes/api.php');
    }
}
