<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apikeys extends Model
{
    public static function boot(){
        parent::boot();
        self::creating(function ($model){
        $model->uuid = (string) Uuid::generate();
    });

}

    protected $fillable = [
        'lable',
        'user_id',
        'verification_key',
        'uuid',
    ];
}
