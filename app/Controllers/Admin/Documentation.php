<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Documentation extends BaseController
{
    public function index()
    {
        return view('admin/documentation');
    }
}
