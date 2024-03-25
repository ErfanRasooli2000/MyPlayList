<?php

namespace Modules\PlayList\Database\Repositories\Eloquents;

use Illuminate\Support\Facades\DB;
use Modules\PlayList\Database\Repositories\Contracts\playlistRepositoryInterface;
use Modules\PlayList\Models\Playlist;

class playlistRepository implements playlistRepositoryInterface
{
    public function __construct(protected Playlist $model){}

    public function create($validated)
    {
        DB::transaction(function () use ($validated){

            $playlist = $this->model->create([
                'created_by' => $validated["created_by"],
                'name' => $validated["name"],
            ]);

            $playlist->users()->sync([$validated["created_by"]]);

        });
    }
}
