<?php

namespace Modules\Authentication\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Authentication\Mail\WelcomeMail;
use Modules\Authentication\Foundation\Authentication;
use Modules\Authentication\Http\Requests\Frontend\LoginRequest;
use Modules\Authentication\Notifications\Frontend\WelcomeNotification;

class LoginController extends Controller
{
    use Authentication;

    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view('authentication::frontend.login');
    }

    /**
     * Login method
     */
    public function postLogin(LoginRequest $request)
    {
        $errors =  $this->login($request);


        if ($errors) {
            return redirect()->back()->withErrors($errors)->withInput($request->except('password'));
        }
     

        // if (auth()->user()->can('dashboard_access')) {
        //     return redirect('/dashboard');
        // }

        return redirect()->route('frontend.home');
    }


    /**
     * Logout method
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('frontend.home');
    }
}
