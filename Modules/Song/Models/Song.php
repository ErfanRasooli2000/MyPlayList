<?php

namespace Modules\Song\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Album\Models\Album;
use Modules\Artist\Models\Artist;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_fa",
        "name_en",
        "file_id",
        "album_id",
    ];

    public function url()
    {
        return $this->hasOne(musicUrl::class , 'song_id');
    }

    public function lyric()
    {
        return $this->hasMany(MusicLyric::class , 'song_id');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class , 'song-artist');
    }

    public function album()
    {
        return $this->belongsTo(Album::class , "album_id");
    }
}
