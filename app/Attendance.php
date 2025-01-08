<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
