<?php

namespace Modules\Song\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musicUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        "url",
        "song_id",
    ];

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }
}
