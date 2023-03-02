<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ClientInfo extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Users Information'
        ];
        return view('admin/client_info', $data);
    }
}
