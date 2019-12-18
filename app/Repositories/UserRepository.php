<?php
namespace App\Repositories;

use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class UserRepository implements UserInterface 
{
    const NUMBER_OF_ITEM = 10;

    public function getCurrentUserId() {
        return Auth::user()->id;
    }

    public function createUser($data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getAll() {
        return User::paginate(self::NUMBER_OF_ITEM);
    }

    public function deleteById($userId) {
        User::find($userId)->delete();
    }
}
