<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [,
            'title' => 'Admin Login - CoffeeAI',
            'validation' => \Config\Services::validation(),
        ];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateAdmin[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateAdmin' => 'Email or Password don\'t match'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                return redirect()->to(base_url('/admin/signin'))->withInput();
            } else {
                $user = $this->adminModel->where('email', $this->request->getVar('email'))->first();
                if ($user['is_active'] == '1') {
                    $this->setUserSession($user);
                    return redirect()->to(base_url('/admin'));
                }
                return redirect()->to(base_url('/admin/signin'))->withInput();
            }
        }
        return view('auth/admin_signin', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'uuid' => $user['uuid'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedInAdmin' => true,
        ];
        session()->set($data);
        return true;
    }
}
