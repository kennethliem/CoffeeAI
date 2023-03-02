<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Documentation extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Documentation'
        ];
        return view('admin/documentation', $data);
    }
}
