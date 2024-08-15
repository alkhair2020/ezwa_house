<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function clients(){
        return $this->hasMany('App\Client','property_id','id');
    } 
    public function prices()
    {
        return $this->belongsTo(Price::class,'price_id ');
    }
}
