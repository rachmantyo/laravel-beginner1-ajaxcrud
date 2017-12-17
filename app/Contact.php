<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name', 'email','photo'
    ];

     //protected $hidden = 'id';

     protected $table = 'contacts';
}

