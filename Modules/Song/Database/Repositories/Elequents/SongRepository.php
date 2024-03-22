<?php

namespace Modules\Song\Database\Repositories\Elequents;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Song\Database\Repositories\Contracts\SongRepositoryInterface;
use Modules\Song\Models\MusicLyric;
use Modules\Song\Models\musicUrl;
use Modules\Song\Models\Song;

class SongRepository implements SongRepositoryInterface
{
    public function __construct(protected Song $model , protected MusicLyric $lyric , protected musicUrl $url){}
    public function getAllWithPagination(\Illuminate\Http\Request $request)
    {
        $perPage = $request->perPage ?? 20;
        $relations = $request->relations ? explode("," , $request->relations) : [];

        $orderBy = "DESC";

        return $this->model
            ->with($relations)
            ->newQuery()
            ->orderBy("id" , $orderBy)
            ->paginate($perPage);
    }

    public function create(mixed $validated)
    {
        DB::transaction(function () use ($validated){

            $song = $this->model->create([
                'name_fa' => $validated["name_fa"],
                'name_en' => $validated["name_en"],
                'album_id' => $validated["album"],
            ]);

            $song->url()->create(['url' => $validated["url"]]);

            $song->lyric()->create(['lyric' => $validated["lyrics"]]);

            $song->artists()->sync($validated["artists"]);
        });

        return true;
    }

    public function update(Song $song, mixed $validated)
    {
        DB::transaction(function () use ($song , $validated){

            $song->update([
                'name_fa' => $validated["name_fa"],
                'name_en' => $validated["name_en"],
                'album_id' => $validated["album"],
            ]);

            $song->url()->update(['url' => $validated["url"]]);

            $song->lyric()->update(['lyric' => $validated["lyrics"]]);

            $song->artists()->sync($validated["artists"]);
        });
    }
}
