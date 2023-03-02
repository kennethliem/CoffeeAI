<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ModelConfig extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Deep Learning Model Configuration'
        ];
        return view('admin/model_config', $data);
    }
}
