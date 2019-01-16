<?php

namespace App;
use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;


class Apikeys extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate();
        });
    }


    protected $fillable = [
        'lable',
        'user_id',
        'uuid',
    ];
}
