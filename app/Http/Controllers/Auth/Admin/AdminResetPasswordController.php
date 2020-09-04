<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AdminResetPasswordController extends Controller
{



    use ResetsPasswords;

    //protected $redirectTo = RouteServiceProvider::HOME;


    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/home';
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }


}
