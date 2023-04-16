<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Profile extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Profile',
            'profile' => $this->adminModel->getUsers(session()->get('uuid'))
        ];

        if ($this->request->getMethod() == 'put') {
            $this->adminModel->save([
                'uuid' => session()->get('uuid'),
                'phone' => htmlspecialchars($this->request->getVar('phone')),
                'address' => htmlspecialchars($this->request->getVar('address')),
                'updated_by' => session()->get('full_name'),
            ]);
            session()->setFlashdata('success', 'Data updated');
            return redirect()->to(base_url('admin/profile'));
        } else {
            return view('admin/profile', $data);
        }
    }

    public function changePassword()
    {
        $data = [
            'request' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'oldPassword' => 'required|min_length[6]|max_length[255]',
                'newPassword' => 'required|min_length[6]|max_length[255]',
                'confirmPassword' => 'required|matches[newPassword]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to('/admin/profile')->withInput();
            } else {
                $currentPassword = $this->request->getVar('oldPassword');
                $newPassword = $this->request->getVar('newPassword');
                $dataUser = $this->adminModel->getUsers(session()->get('uuid'));

                if (!password_verify($currentPassword, $dataUser['password_hash'])) {
                    $data['validation'] = $this->validator;
                    session()->setFlashdata('danger', 'Wrong Password');
                    return redirect()->to('/admin/profile');
                } else {
                    if ($currentPassword == $newPassword) {
                        $data['validation'] = $this->validator;
                        session()->setFlashdata('danger', 'Password lama dan password baru tidak boleh sama!.');
                        return redirect()->to('/admin/profile');
                    } else {
                        $newData = [
                            'uuid' => session()->get('uuid'),
                            'password_hash' => password_hash($this->request->getVar('newPassword'), PASSWORD_DEFAULT),
                        ];
                        $this->adminModel->save($newData);
                        session()->setFlashdata('success', 'Password berhasil diubah');
                        return redirect()->to('/admin/profile');
                    }
                }
            }
        }
    }
}
