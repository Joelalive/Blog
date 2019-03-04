<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function getAvatarAttribute($avatar){
        return asset($avatar);
    }
    
    protected $guarded = [];

    public function user(){
        $this->belongsTo(User::class);
    }
}
