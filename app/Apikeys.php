<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use App\User;



class Apikeys extends Model
{

    public function user(){
        return $this->belongsTo('App\User::class');
    }

    protected $fillable = [
        'label',
        'user_id',
        'uuid',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Uuid::generate();
        });
    }







}
