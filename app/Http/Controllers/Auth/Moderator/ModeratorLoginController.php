<?php

namespace App\Http\Controllers\Auth\Moderator;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class ModeratorLoginController extends Controller{


    use AuthenticatesUsers;

    protected $redirectTo = "moderator/home";

    public function __construct(){
        $this->middleware('guest:moderator,moderator/home')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.moderator.login');
    }

    protected function guard()
    {
        return Auth::guard('moderator');
    }
}

