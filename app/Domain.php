<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'urlname',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
