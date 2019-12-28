<?php

namespace App\Models;

use App\Models\User;

class LogProfile extends BaseModel
{
    protected $table = 'log_profile';

    protected $fillable = [
        'time_change',
        'admin_name',
        'field_change',
        'action',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
