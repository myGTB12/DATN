<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    protected $userService;
    protected $form;

    public function __construct(
        UserService $userService,
        CustomValidator $form,
    ) {
        $this->userService = $userService;
        $this->form = $form;
    }

    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            // Validate inputs
            $this->form->validate($request, "StationOwnerLoginForm");

            $response = $this->userService->loginAccount($request);
            if ($response === true) {
                //Check user verify
                auth()->guard('user')->user();
                session()->push('user', true);
                return redirect()->route('stations.index');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with("error", $response);
        }
        
        return view("content.authentications.station-owner-auth-login");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        return redirect()->route("login");
    }
}
