<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{

    // تحديد الجدول المرتبط
    protected $table = 'user_contracts';

    // الحقول القابلة للتعبئة 
    protected $fillable = [
        'user_id',
        'type',
        'start_date',
        'end_date',
    ];

    // العلاقة مع جدول المستخدمين
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
