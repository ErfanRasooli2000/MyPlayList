<?php

namespace Modules\Artist\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Artist\Database\Repositories\Contracts\ArtistRepositoryInterface;
use Modules\Artist\Database\Repositories\Eloquents\ArtistRepository;

class ArtistRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ArtistRepositoryInterface::class , ArtistRepository::class);
    }
}
