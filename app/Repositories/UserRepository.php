<?php
namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Auth;

class UserRepository implements UserInterface 
{
    public function getCurrentUserId() {
        return Auth::user()->id;
    }
}
