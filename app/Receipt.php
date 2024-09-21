<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Receipt extends Model
{
    protected $fillable = [
        'user_id', 'client_id', 'amount','date'
    ];
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
    public function users(){
        // return $this->hasOne(User::class, 'user_id');
        return $this->belongsTo(User::class,'user_id','id');
    }
}
