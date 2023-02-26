<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;


class Detection extends BaseController
{
    public function index()
    {
        return view('homepage/detection');
    }
}
