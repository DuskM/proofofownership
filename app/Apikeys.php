<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apikeys extends Model
{
    //
    protected $fillable = [
        'user_id',
        'lable',
    ];

}
