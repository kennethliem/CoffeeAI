<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Sponsors extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Our Sponsors'
        ];
        return view('admin/sponsors', $data);
    }
}
