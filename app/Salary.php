<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
