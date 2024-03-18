<?php

namespace Modules\Song\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicLyric extends Model
{
    use HasFactory;

    protected $fillable = [
        'lyric',
        'song_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class , 'song_id');
    }
}
