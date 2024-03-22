<?php

namespace Modules\Album\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Album\Database\Repositories\Contracts\AlbumRepositoryInterface;
use Modules\Album\Database\Repositories\Eloquents\AlbumRepository;

class AlbumRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AlbumRepositoryInterface::class , AlbumRepository::class);
    }
}
