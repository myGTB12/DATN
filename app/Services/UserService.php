<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
        $user = $this->userRepository->checkUser($request);
        if (!$user) {
            return __("messages.login_fail");
        }

        Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return true;
    }

    public function createUser($request){
        return $this->userRepository->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'email_verified_at' => Carbon::now(),
        ]);
    }

    public function updateProfile($id, $request){
        return $this->userRepository->update($id, [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => $request->password,
            "phone" => $request->phone,
            "strict" => $request->strict,
            "city" => $request->city,
            "address" => $request->address
        ]);
    }
}