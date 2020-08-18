<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'author', 'user_id', 'year', 'publisher', 'language', 'pages', 'state'
    ];
}
