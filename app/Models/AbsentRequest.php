<?php

namespace App\Models;

class AbsentRequest extends BaseModel
{
    const STATUS_PROCESSING = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_DENY = 2;

    protected $fillable = [
        'time_absent_from',
        'time_absent_to',
        'reason',
        'day',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
