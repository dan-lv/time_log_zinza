<?php

namespace App\Models;

use App\Models\User;

class LogProfile extends BaseModel
{
    protected $table = 'profile_logs';

    protected $fillable = [
        'time_change',
        'update_user_id',
        'field_change',
        'action',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function updateUser()
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id')->withTrashed();
    }
}
