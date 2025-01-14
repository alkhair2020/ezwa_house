<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
