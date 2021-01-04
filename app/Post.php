<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    protected $dates = [
        'published_at',
    ];
}
