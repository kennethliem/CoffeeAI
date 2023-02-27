<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!session()->get('role_id') == '') {
            session()->setFlashdata('pesan', 'Anda belum login, silakan login terlebih dahulu!');
            return redirect()->to('admin/signin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('role_id') == 2) {
            return redirect()->to('/admin');
        }
    }
}
