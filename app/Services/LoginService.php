<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquent\AdminRepository;

class LoginService
{
    protected AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function loginAccount(Request $request)
    {
        // Check info login
        $admin = $this->adminRepository->checkAdmin($request);
        if (!$admin) {
            return __("messages.login_fail");
        }

        Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return true;
    }

    public function confirmEmail($request)
    {
        // Check info login
        $user = $this->adminRepository
            ->clearQuery()
            ->where("email", $request->email)
            ->whereNotNull("email_verified_at")
            ->first();
        if (empty($user)) {
            return __("messages.exists_email");
        }
        $token = hash_hmac("sha256", Str::random(40), config("app.key"));
        DB::beginTransaction();
        return __("messages.error_has_occurred");
    }
}
