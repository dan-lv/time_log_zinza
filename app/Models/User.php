<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TimeLog;
use App\Models\Profile;
use App\Models\AbsentRequest;
use App\Models\LogProfile;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const IS_ADMIN = 1;
    const IS_USER = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class, 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function absents()
    {
        return $this->hasMany(AbsentRequest::class, 'user_id', 'id');
    }

    public function logProfiles()
    {
        return $this->hasMany(LogProfile::class, 'user_id', 'id');
    }
}
