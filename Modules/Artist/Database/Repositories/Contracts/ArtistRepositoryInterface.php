<?php

namespace Modules\Artist\Database\Repositories\Contracts;

interface ArtistRepositoryInterface
{
    public function create(mixed $validated);

    public function getAllWithPagination(\Illuminate\Http\Request $request);

    public function update(\Modules\Artist\Models\Artist $artist, mixed $validated);

    public function getForSelect();
}
