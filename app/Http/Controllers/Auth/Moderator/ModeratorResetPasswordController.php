<?php

namespace App\Http\Controllers\Auth\Moderator;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ModeratorResetPasswordController extends Controller
{

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.moderator.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('moderators');
    }

    protected function guard()
    {
        return Auth::guard('moderator');
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/moderator/home';
    }


    use ResetsPasswords;


}

