<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BeanDirectory extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Bean Type Directory'
        ];
        return view('admin/bean_directory', $data);
    }
}
