<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/user_signin');
    }
}
