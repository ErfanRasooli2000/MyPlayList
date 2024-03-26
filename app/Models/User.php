<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\PlayList\Models\Playlist;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'telegram_id',
        'username',
        'step',
    ];

    public static function getUserById($id)
    {
        return User::where("telegram_id", (string) $id)->get()->first();
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class , 'playlist-user');
    }
}
