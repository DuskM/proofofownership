<?php

namespace App;
use Webpatser\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;


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
        'label',
        'user_id',
        'uuid',
    ];
}
