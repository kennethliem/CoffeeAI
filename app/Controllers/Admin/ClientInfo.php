<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ClientInfo extends BaseController
{
    public function index()
    {
        return view('admin/client_info');
    }
}
