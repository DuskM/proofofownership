<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Domain extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'verification_key',
    ];
    public function user(){
        return $this->belongsTo('App\User::class');
    }

}
