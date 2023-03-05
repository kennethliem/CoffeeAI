<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;

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
            'title' => 'Admin Management',
            'users' => $this->adminModel->getUsers(),
            'request' => \Config\Services::request(),
        ];
        return view('admin/admin_management', $data);
    }

    public function register()
    {
        $data = [];
        helper('form');
        $uuid = service('uuid');

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'full_name' => 'required|min_length[3]|max_length[30]',
                'phone' => 'required|min_length[3]|max_length[30]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to('admin/management');
            } else {
                $newData = [
                    'uuid' => $uuid->uuid4()->toString(),
                    'full_name' => htmlspecialchars($this->request->getVar('full_name')),
                    'email' => htmlspecialchars($this->request->getVar('email')),
                    'phone' => htmlspecialchars($this->request->getVar('phone')),
                    'role' => htmlspecialchars($this->request->getVar('select_role')),
                    'password_hash' => htmlspecialchars($this->request->getVar('password')),
                    'is_active' => 0,
                    'updated_by' => "ThrustedDeveloper",
                ];
                $this->adminModel->save($newData);
                session()->setFlashdata('success', 'Data added successfully');
                return redirect()->to(base_url('admin/management'));
            }
        }
    }

    public function delete($uuid)
    {
        if ($this->request->getMethod() == 'delete') {
            $this->adminModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('/admin/management'));
        }
    }
}
