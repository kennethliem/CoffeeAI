<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function signin()
    {
        return view('auth/user_signin');
    }

    public function signup()
    {
        return view('auth/user_signup');
    }
}
