<?php

namespace Modules\Artist\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Song\Models\Song;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_fa",
        "name_en",
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class , 'song-artist');
    }
}
