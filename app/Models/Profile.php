<?php

namespace App\Models;
use App\Models\User;

class Profile extends BaseModel
{
    protected $fillable = [
        'fullname', 
        'gender', 
        'birthday',
        'phone_number',
        'address',
        'position',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
