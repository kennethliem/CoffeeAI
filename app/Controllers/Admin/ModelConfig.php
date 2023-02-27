<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ModelConfig extends BaseController
{
    public function index()
    {
        return view('admin/model_config');
    }
}
