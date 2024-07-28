<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    protected $table = "losses";
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
}
