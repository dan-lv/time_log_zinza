<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarFormRequest;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = $this->userRepository->getCurrentUserId();
        $profile = $this->profileRepository->getProfile($userId);

        return view('user.profile')->with('profile', $profile);
    }

    public function store(ProfileFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $this->profileRepository->updateProfile($request->validated(), $userId);

        return redirect()->route('profiles.index')->with('status', 'Your Profile has been updated');
    }

    public function storeAvatar(AvatarFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $profile = $this->profileRepository->storeImage($request->validated(), $userId);

        return redirect()->route('profiles.index', $userId);
    }
}
