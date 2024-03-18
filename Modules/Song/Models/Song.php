<?php

namespace Modules\Song\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_fa",
        "name_en",
        "file_id",
    ];

    public function url()
    {
        return $this->hasOne(musicUrl::class , 'song_id');
    }

    public function lyric()
    {
        return $this->hasMany(MusicLyric::class , 'song_id');
    }
}
