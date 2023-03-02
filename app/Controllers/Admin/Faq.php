<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Faq extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Frequently Asked Questions'
        ];
        return view('admin/faq', $data);
    }
}
