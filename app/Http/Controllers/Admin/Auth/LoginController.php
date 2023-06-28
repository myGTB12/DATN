<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LoginService;
use App\Form\CustomValidator;

class LoginController extends Controller
{
    protected $login;
    protected $form;

    public function __construct(
        LoginService $login,
        CustomValidator $form,
    ) {
        $this->login = $login;
        $this->form = $form;
    }

    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            // Validate inputs
            $this->form->validate($request, "LoginForm");

            $response = $this->login->loginAccount($request);
            if ($response === true) {
                //Check user verify
                auth()->guard('admin')->user();
                session()->push('admin', true);
                return redirect()->route("users.list");
            }

            return redirect()
                ->back()
                ->withInput()
                ->with("error", __('messages.login_fail'));
        }
        return view('content.authentications.auth-login');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        return redirect()->route("login");
    }
}
