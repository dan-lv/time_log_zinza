<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageFormRequest;
use App\Http\Requests\ProfileFormRequest;
use App\Interfaces\ProfileInterface;
use App\Interfaces\UserInterface;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $profileRepository;
    private $userRepository;

    public function __construct(ProfileInterface $profileRepository, UserInterface $userRepository)
    {
        $this->profileRepository = $profileRepository;
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('user.absent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $profile = $this->profileRepository->getProfile($userId);

        return view('user.profile')->with('profile', $profile);
    }

    public function update(ProfileFormRequest $request, $userId)
    {
        $this->profileRepository->updateProfile($request->validated(), $userId);

        return redirect()->route('profiles.show', $userId)->with('status', 'Your Profile has been updated');
    }

    public function storeImage(ImageFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $profile = $this->profileRepository->storeImage($request, $userId);

        return redirect()->route('profiles.show', $userId)->with('profile', $profile);
    }
}
