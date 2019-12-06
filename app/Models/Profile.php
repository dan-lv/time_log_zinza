<?php

namespace App\Models;

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
}
