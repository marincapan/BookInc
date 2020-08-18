<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'book_id', 'end_date', 'user_id', 'start_date'
    ];
}
