<?php

namespace Modules\Song\Database\Repositories\Contracts;

use Modules\Song\Models\Song;

interface SongRepositoryInterface
{
    public function getAllWithPagination(\Illuminate\Http\Request $request);

    public function create(mixed $validated);


    public function update(Song $song, mixed $validated);

    public function groupCreate(array $data);
}
