<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminManagement extends BaseController
{
    public function index()
    {
        return view('admin/admin_management');
    }
}
