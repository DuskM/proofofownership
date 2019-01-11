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
