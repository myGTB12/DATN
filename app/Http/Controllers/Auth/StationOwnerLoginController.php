<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Form\CustomValidator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\StationOwnerService;

class StationOwnerLoginController extends Controller
{
    protected $stationOwnerService;
    protected $form;

    public function __construct(
        StationOwnerService $stationOwnerService,
        CustomValidator $form,
    ) {
        $this->stationOwnerService = $stationOwnerService;
        $this->form = $form;
    }

    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            // Validate inputs
            $this->form->validate($request, "StationOwnerLoginForm");

            $response = $this->stationOwnerService->loginAccount($request);
            if ($response === true) {
                //Check user verify
                auth()->guard('station_owner')->user();
                session()->push('station_owner', true);
                return redirect()->route('stations.index');
            }

            return redirect()
                ->back()
                ->withInput()
                ->with("error", $response);
        }
        return view("auth.login");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        return redirect()->route("login");
    }
}
