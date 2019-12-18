<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;

class ManageUserController extends Controller
{
    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('admin.user.index')->with('users', $users);
    }

    public function destroy($userId)
    {
        $this->userRepository->deleteById($userId);

        return back()->with('status', __('user.delete_success'));
    }
}
