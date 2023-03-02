<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AppInformation extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Application Informations'
        ];
        return view('admin/app_information', $data);
    }
}
