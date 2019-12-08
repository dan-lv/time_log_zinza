<?php
namespace App\Repositories;

use App\Interfaces\ProfileInterface;
use App\Models\Profile;

class ProfileRepository implements ProfileInterface 
{
    public function getProfile($userId) {
        return Profile::where('user_id', $userId)->first();
    }

    public function updateProfile($request, $userId) {
        $profile = Profile::where('user_id', $userId)->first();
        
        $profile->update([
            'fullname' => $request['fullname'], 
            'gender' => $request['gender'], 
            'birthday' => $request['birthday'],
            'phone_number' => $request['phone'],
            'address' => $request['address'],
            'position' => $request['position'],
        ]);
    }

    public function storeImage($request, $userId) {
        $image = $request['image'];
        $nameImage = $image->getClientOriginalName();
        $image->move('images', $nameImage);
        $profile = Profile::where('user_id', $userId)->first();
            
        $profile->image = $nameImage;
        $profile->save();

        return $profile;
    }

    public function createProfile($event) {
        Profile::create([
            'user_id' => $event->user->id,
            'fullname' => $event->user->name,
        ]);
    }
}
