<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamsModel;

class Teams extends BaseController
{
    protected $teamsModel;

    public function __construct()
    {
        $this->teamsModel = new TeamsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Our Teams',
            'teams' => $this->teamsModel->getTeams()
        ];

        return view('admin/teams', $data);
    }

    public function detail($getData)
    {
        $data = [
            'team' => $this->teamsModel->getTeams($getData),
        ];
        return view('admin/modal/edit/team', $data);
    }

    public function add()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fullname' => 'required',
                'position' => 'required',
                'photoAlternate' => 'required',
                'photo' => [
                    'rules' => 'uploaded[photo]|max_size[photo,10000]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Please choose an Image',
                        'max_size' => 'File size to large',
                        'is_image' => 'Please choose an Image',
                        'mime_in' => 'Please choose an Image',
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/teams'));
            } else {
                $filePhoto = $this->request->getFile('photo');
                $namePhoto = $filePhoto->getRandomName();
                $filePhoto->move('assets/images/teams', $namePhoto);

                $this->teamsModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'fullname' => htmlspecialchars($this->request->getVar('fullname')),
                    'position' => htmlspecialchars($this->request->getVar('position')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/teams'));
            }
        }
    }

    public function update($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'fullname' => 'required',
                'position' => 'required',
                'photoAlternate' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/teams'));
            } else {
                $filePhoto = $this->request->getFile('photo');

                if ($filePhoto->getError() == 4) {
                    $namePhoto = $this->request->getVar('old_photo');
                } else {
                    $fileUrl = $this->teamsModel->getFileUrl($uuid);
                    unlink('assets/images/teams/' . $fileUrl['photo_url']);

                    $namePhoto = $filePhoto->getRandomName();
                    $filePhoto->move('assets/images/teams', $namePhoto);
                }
                $this->teamsModel->save([
                    'uuid' => $uuid,
                    'fullname' => htmlspecialchars($this->request->getVar('fullname')),
                    'position' => htmlspecialchars($this->request->getVar('position')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/teams')->withInput();
            }
        }
    }

    public function delete($uuid)
    {
        if ($this->request->getMethod() == 'delete') {

            $fileUrl = $this->teamsModel->getFileUrl($uuid);
            unlink('assets/images/teams/' . $fileUrl['photo_url']);
            $this->teamsModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/teams'));
        }
    }
}
