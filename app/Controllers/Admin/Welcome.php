<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        return view('admin/welcome');
    }
}
