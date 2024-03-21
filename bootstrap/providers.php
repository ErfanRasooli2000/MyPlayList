<?php

return [
    App\Providers\AppServiceProvider::class,
    \Modules\Album\Providers\AlbumServiceProvider::class,
    Modules\Artist\Providers\ArtistServiceProvider::class,
    Modules\Song\Providers\SongServiceProvider::class,
    \Modules\Keyboard\Providers\KeyboardServiceProvider::class
];
