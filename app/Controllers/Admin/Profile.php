<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profile'
        ];
        return view('admin/profile', $data);
    }
}
