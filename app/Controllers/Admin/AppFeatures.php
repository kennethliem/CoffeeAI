<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AppFeatures extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Application Features'
        ];
        return view('admin/app_features', $data);
    }
}
