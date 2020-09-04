<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class AdminForgetPasswordController extends Controller
{


    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.admin.passwords.email');
    }
    public function broker()
    {
        return Password::broker('admins');
    }
}
