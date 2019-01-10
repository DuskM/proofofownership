<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Domain extends Model
{
    protected $fillable = [
        'urlname',
        'user_id',
        'keygen',
    ];
    public function user(){
        return $this->belongsTo('App\User::class');
    }

}
