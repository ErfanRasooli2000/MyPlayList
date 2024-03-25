<?php

namespace Modules\PlayList\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PlayList\Database\Repositories\Contracts\playlistRepositoryInterface;
use Modules\PlayList\Database\Repositories\Eloquents\playlistRepository;

class PlaylistRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(playlistRepositoryInterface::class , playlistRepository::class);
    }
}
