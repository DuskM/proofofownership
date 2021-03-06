<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Webpatser\Uuid\Uuid;

class Apikeys extends Model
{

    public function user(){
        return $this->belongsTo('App\User::class');
    }

    protected $fillable = [
        'label',
        'user_id',
        'uuid',
        'verification_key',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate();
            $model->verification_key = (string) Uuid::generate();
        });
    }

    public function getRouteKeyName(){
        return 'uuid';
    }







}
