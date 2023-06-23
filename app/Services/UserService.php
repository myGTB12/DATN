<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginAccount(Request $request)
    {
        // Check info login
        $admin = $this->userRepository->checkUser($request);
        if (!$admin) {
            return __("messages.login_fail");
        }

        Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return true;
    }
}