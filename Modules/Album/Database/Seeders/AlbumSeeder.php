<?php

namespace Modules\Album\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Album\Models\Album;
use Modules\Song\Models\Song;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name_fa" => "کدر",
                "name_en" => "Keder",
                "artists" => [1,7,8,9,4],
                "songs" => [1,2,3,4,5,6],
            ],
            [
                "name_fa" => "رگ خواب",
                "name_en" => "Rage Khab",
                "artists" => [3],
                "songs" => [8,9,10,11,12,13,14,15,16,17,18],
            ],
            [
                "name_fa" => "نقاشی",
                "name_en" => "Naghashi",
                "artists" => [5],
                "songs" => [27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42],
            ],
            [
                "name_fa" => null,
                "name_en" => "folklore",
                "artists" => [6],
                "songs" => [43,44,45,46,47,48,49,50,51,52,53,54,55,56,57],
            ],
            [
                "name_fa" => "اشتباه خوب",
                "name_en" => "Eshtebah Khoob",
                "artists" => [10],
                "songs" => [58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73],
            ],
            [
                "name_fa" => "78",
                "name_en" => "78",
                "artists" => [13],
                "songs" => [74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98],
            ],
            [
                "name_fa" => null,
                "name_en" => "420-vol2",
                "artists" => [15,16,17,18,19,20,21,22,23,24,25],
                "songs" => [99,100,101,102,103,104,105,106,107,108,109,110],
            ],
        ];

        foreach ($data as $item) {

            $album = Album::create([
                "name_en" => $item["name_en"],
                "name_fa" => $item["name_fa"],
            ]);

            $albumArtist = [];

            foreach ($item["artists"] as $artist)
                $albumArtist[] = [
                    "artist_id" => $artist,
                    "album_id" => $album->id
                ];

            DB::table("album-artist")->insert($albumArtist);

            Song::whereIn("id" , $item["songs"])->update([
                "album_id" => $album->id
            ]);
        }
    }
}
