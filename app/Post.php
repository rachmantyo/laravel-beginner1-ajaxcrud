<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'title', 'desc',
    ];

     protected $hidden = 'id';

     protected $table = 'posts';
}
