<?php

namespace Modules\Artist\Database\Repositories\Eloquents;

use Illuminate\Http\Request;
use Modules\Artist\Database\Repositories\Contracts\ArtistRepositoryInterface;
use Modules\Artist\Models\Artist;

class ArtistRepository implements ArtistRepositoryInterface
{
    public function __construct(protected Artist $model){}

    public function getAllWithPagination(Request $request)
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

    public function update(\Modules\Artist\Models\Artist $artist, mixed $validated)
    {
        return $artist->update($validated);
    }
}
