<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Teams extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Our Teams'
        ];
        return view('admin/teams', $data);
    }
}
