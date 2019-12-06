<?php

namespace App\Models;
use App\Models\User;

class TimeLog extends BaseModel
{
    protected $fillable = [
        'check_in', 
        'check_out', 
        'day',
        'user_id',
    ];
        
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
