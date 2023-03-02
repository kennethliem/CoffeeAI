<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Welcome Admin'
        ];
        return view('admin/welcome', $data);
    }
}
