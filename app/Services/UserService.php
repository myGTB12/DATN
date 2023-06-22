<?php

namespace App\Services;

use Illuminate\Http\Request;

class StationOwnerService
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