<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use Webpatser\Uuid\Uuid;

class Domain extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'uuid',
    ];
    public function user(){
        return $this->belongsTo('App\User::class');
    }

        public static function boot(){
        parent::boot();
        self::creating(function ($model){
            $model->uuid = (string) Uuid::generate();
        });

    }

    public function getRouteKeyName(){
        return 'uuid';
    }

}
