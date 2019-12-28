<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarFormRequest;
use App\Http\Requests\ProfileFormRequest;
use App\Interfaces\ProfileInterface;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Events\ProfileUpdated;

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
    public function show($userId)
    {
        $profile = $this->profileRepository->getProfile($userId);

        return view('user.profile')->with('profile', $profile);
    }

    public function update(ProfileFormRequest $request, $userId)
    {
        $currentUserRole = $this->userRepository->getCurrentUserRole();

        // Get different field to log profile changes
        $profileBeforeUpdate = $this->profileRepository->getProfile($userId);
        $fieldDiff = $this->profileRepository->getFieldDiff($request->validated(), $profileBeforeUpdate);

        $profileUpdated = $this->profileRepository->updateProfile($request->validated(), $userId);

        if ($currentUserRole == User::IS_ADMIN) {
            $this->userRepository->updateRole($request->validated(), $userId);
        }

        if (!empty($fieldDiff)) {
            event(new ProfileUpdated($profileUpdated, $fieldDiff));
        }

        return redirect()->route('profiles.show', $userId)->with('status', 'Your Profile has been updated');
    }

    public function storeAvatar(AvatarFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();

        // Get different field to log profile changes
        $profileBeforeUpdate = $this->profileRepository->getProfile($userId);
        $fieldDiff = $this->profileRepository->getFieldDiff($request->validated(), $profileBeforeUpdate);

        $profileUpdated = $this->profileRepository->storeImage($request->validated(), $userId);

        if (!empty($fieldDiff)) {
            event(new ProfileUpdated($profileUpdated, $fieldDiff));
        }

        return redirect()->route('profiles.show', $userId);
    }
}
