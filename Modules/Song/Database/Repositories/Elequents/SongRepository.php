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

            $this->url->create([
                'song_id' => $song->id,
                'url' => $validated["url"]
            ]);

            $this->lyric->create([
                'song_id' => $song->id,
                'lyric' => $validated["lyrics"]
            ]);

            $artists = [];

            foreach ($validated["artists"] as $item)
            {
                $artists[] = [
                    'song_id' => $song->id,
                    'artist_id' => $item
                ];
            }

            DB::table('song-artist')->insert($artists);
        });

        return true;
    }

    public function update(Song $song, mixed $validated)
    {

    }
}
