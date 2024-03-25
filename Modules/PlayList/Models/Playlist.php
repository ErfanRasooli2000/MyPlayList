<?php

namespace Modules\PlayList\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_by',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class , 'playlist-user');
    }
}
