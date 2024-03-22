<?php

namespace Modules\Album\Database\Repositories\Eloquents;

use Modules\Album\Database\Repositories\Contracts\AlbumRepositoryInterface;
use Modules\Album\Models\Album;

class AlbumRepository implements AlbumRepositoryInterface
{
    public function __construct(protected Album $model){}

    public function getAllWithPagination(\Illuminate\Http\Request $request)
    {
        $perPage = $request->perPage ?? 20;
        $orderBy = "DESC";

        return $this->model
            ->newQuery()
            ->orderBy("id" , $orderBy)
            ->paginate($perPage);
    }

    public function create(mixed $validated)
    {
        return $this->model->create($validated);
    }

    public function update(\Modules\Album\Models\Album $album, mixed $validated)
    {
        return $album->update($validated);
    }
}
