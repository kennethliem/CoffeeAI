<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PageContent extends BaseController
{
    public function index()
    {
        return view('admin/page_content');
    }
}
