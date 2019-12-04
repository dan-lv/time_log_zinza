<?php

namespace App\Models;

class AbsentRequest extends BaseModel
{
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
