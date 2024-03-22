<?php

namespace Modules\Album\Database\Repositories\Contracts;

interface AlbumRepositoryInterface
{

    public function getAllWithPagination(\Illuminate\Http\Request $request);

    public function create(mixed $validated);

    public function update(\Modules\Album\Models\Album $album, mixed $validated);
}
