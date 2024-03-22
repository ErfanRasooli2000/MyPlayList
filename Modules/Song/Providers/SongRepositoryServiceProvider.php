<?php

namespace Modules\Song\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Song\Database\Repositories\Contracts\SongRepositoryInterface;
use Modules\Song\Database\Repositories\Elequents\SongRepository;

class SongRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SongRepositoryInterface::class , SongRepository::class);
    }

    public function boot()
    {

    }
}
