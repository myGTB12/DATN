<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Services\UserService;
use App\Http\Controllers\Controller;

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
            $this->form->validate($request, "LoginForm");

            $response = $this->userService->loginAccount($request);
            if ($response === true) {
                //Check user verify
                auth()->guard('user')->user();
                session()->push('user', true);

                return redirect()->route('home');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with("error", __('messages.login_fail'));
        }

        return view("content.authentications.station-owner-auth-login");
    }

    public function logout(Request $request)
    {
        if (auth()->guard('user')->user()) {
            auth()->logout();
            $request->session()->flush();

            return redirect()->route("home");
        }
        if (auth()->guard('station_owner')->user()) {
            auth()->logout();
            $request->session()->flush();

            return redirect()->route("station.login");
        }
        auth()->logout('admin');
        $request->session()->flush();

        return redirect()->route("login");
    }

    public function register(Request $request)
    {
        $result = $this->userService->createUser($request);
        if ($result) {
            return redirect()->route('home');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with("error", $result);
    }

    public function profile($id, Request $request)
    {
        if ($request->isMethod('POST')) {
            $result = $this->userService->updateProfile($id, $request);
            if ($result) {
                return redirect()->route('user.profile', ['user_id' => $id]);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with("error", $result);
        }

        $user = auth()->guard('user')->user() ?? auth()->guard('station_owner')->user();

        return view('content/pages/pages-user-account-settings-account', compact('user'));
    }
}
