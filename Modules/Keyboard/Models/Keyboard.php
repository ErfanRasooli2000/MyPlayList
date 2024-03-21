<?php

namespace Modules\Keyboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' ,
        'message_id' ,
        'type' ,
        'data' ,
    ];

    protected $casts = [
      'data' => 'json'
    ];
}
