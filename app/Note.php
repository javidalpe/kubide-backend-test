<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'username',
        'body',
        'favorite'
    ];

    protected $cast = [
        'favorite' => 'boolean'
    ];
}
