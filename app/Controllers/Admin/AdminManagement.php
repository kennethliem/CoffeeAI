<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminManagement extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Management'
        ];
        return view('admin/admin_management', $data);
    }

    public function register()
    {
        $data = [];
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'full_name' => 'required|min_length[3]|max_length[30]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[admin.email]',
                'password' => 'required|min_length[8]|max_length[255]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to('admin/admin_management');
            } else {
                $newData = [
                    'full_name' => htmlspecialchars($this->request->getVar('full_name')),
                    'uuid' => v3($this->request->getVar('full_name')),
                    'email' => htmlspecialchars($this->request->getVar('email')),
                    'role' => 2,
                    'password_hash' => htmlspecialchars($this->request->getVar('password')),
                    'is_active' => 0,
                    'updated_by' => session('full_name'),
                ];
                $this->adminModel->save($newData);
                session()->setFlashdata('success', 'Data added successfully');
                return redirect()->to(base_url('admin/admin_management'));
            }
        }
    }
}
