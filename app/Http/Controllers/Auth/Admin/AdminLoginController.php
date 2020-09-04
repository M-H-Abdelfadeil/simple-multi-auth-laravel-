<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller{


    use AuthenticatesUsers;

    protected $redirectTo = "admin/home";

    public function __construct(){
        $this->middleware('guest:admin,admin/home')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
