<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeanDirectoryModel;

class BeanDirectory extends BaseController
{
    protected $beanDirectoryModel;

    public function __construct()
    {
        $this->beanDirectoryModel = new BeanDirectoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Bean Type Directory',
            'beans' => $this->beanDirectoryModel->getBeans()
        ];

        return view('admin/bean_directory', $data);
    }

    public function detailBean($getData)
    {
        $data = [
            'bean' => $this->beanDirectoryModel->getBeans($getData),
        ];
        return view('admin/modal/edit/bean', $data);
    }

    public function addBean()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'beanName' => 'required',
                'beanDesc' => 'required',
                'beanType' => 'required',
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
                return redirect()->to(base_url('admin/features'));
            } else {
                $filePhoto = $this->request->getFile('photo');
                $namePhoto = $filePhoto->getRandomName();
                $filePhoto->move('assets/images/beans', $namePhoto);

                $this->beanDirectoryModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'name' => htmlspecialchars($this->request->getVar('beanName')),
                    'type' => htmlspecialchars($this->request->getVar('beanType')),
                    'description' => htmlspecialchars($this->request->getVar('beanDesc')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/beans'));
            }
        }
    }

    public function updateBean($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'beanName' => 'required',
                'beanDesc' => 'required',
                'beanType' => 'required',
                'photoAlternate' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/beans'));
            } else {
                $filePhoto = $this->request->getFile('photo');

                if ($filePhoto->getError() == 4) {
                    $namePhoto = $this->request->getVar('old_photo');
                } else {
                    $fileUrl = $this->beanDirectoryModel->getFileUrl($uuid);
                    unlink('assets/images/beans/' . $fileUrl['photo_url']);

                    $namePhoto = $filePhoto->getRandomName();
                    $filePhoto->move('assets/images/beans', $namePhoto);
                }
                $this->beanDirectoryModel->save([
                    'uuid' => $uuid,
                    'name' => htmlspecialchars($this->request->getVar('beanName')),
                    'type' => htmlspecialchars($this->request->getVar('beanType')),
                    'description' => htmlspecialchars($this->request->getVar('beanDesc')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/beans')->withInput();
            }
        }
    }

    public function deleteBean($uuid)
    {
        if ($this->request->getMethod() == 'delete') {

            $fileUrl = $this->beanDirectoryModel->getFileUrl($uuid);
            unlink('assets/images/beans/' . $fileUrl['photo_url']);
            $this->beanDirectoryModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/beans'));
        }
    }
}
