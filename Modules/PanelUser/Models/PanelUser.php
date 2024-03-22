<?php

namespace Modules\PanelUser\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class PanelUser extends Authenticatable
{
    use HasFactory , HasApiTokens;

    protected $fillable = [
        "name",
        "mobile",
        "username",
        "password"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        "name" => 'string',
        "mobile" => 'string',
        "username" => 'string',
        "password" => 'hashed',
    ];
}
