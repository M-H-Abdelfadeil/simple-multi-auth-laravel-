<?php

namespace App\Http\Controllers\Auth\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ModeratorForgetPasswordController extends Controller
{


    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.moderator.passwords.email');
    }

    public function broker()
    {
        return Password::broker('moderators');
    }



}

