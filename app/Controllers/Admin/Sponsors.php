<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SponsorsModel;

class Sponsors extends BaseController
{
    protected $sponsorsModel;

    public function __construct()
    {
        $this->sponsorsModel = new SponsorsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Our Sponsors',
            'sponsors' => $this->sponsorsModel->getSponsors()
        ];

        return view('admin/sponsors', $data);
    }

    public function detail($getData)
    {
        $data = [
            'sponsor' => $this->sponsorsModel->getSponsors($getData),
        ];
        return view('admin/modal/edit/sponsor', $data);
    }

    public function add()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'sponsorName' => 'required',
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
                return redirect()->to(base_url('admin/sponsors'));
            } else {
                $filePhoto = $this->request->getFile('photo');
                $namePhoto = $filePhoto->getRandomName();
                $filePhoto->move('assets/images/sponsors', $namePhoto);

                $this->sponsorsModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'sponsor_name' => htmlspecialchars($this->request->getVar('sponsorName')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/sponsors'));
            }
        }
    }

    public function update($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'sponsorName' => 'required',
                'photoAlternate' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/sponsors'));
            } else {
                $filePhoto = $this->request->getFile('photo');

                if ($filePhoto->getError() == 4) {
                    $namePhoto = $this->request->getVar('old_photo');
                } else {
                    $fileUrl = $this->sponsorsModel->getFileUrl($uuid);
                    unlink('assets/images/sponsors/' . $fileUrl['photo_url']);

                    $namePhoto = $filePhoto->getRandomName();
                    $filePhoto->move('assets/images/sponsors', $namePhoto);
                }
                $this->sponsorsModel->save([
                    'uuid' => $uuid,
                    'sponsor_name' => htmlspecialchars($this->request->getVar('sponsorName')),
                    'photo_url' => $namePhoto,
                    'photo_alternate' => htmlspecialchars($this->request->getVar('photoAlternate')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/sponsors')->withInput();
            }
        }
    }

    public function delete($uuid)
    {
        if ($this->request->getMethod() == 'delete') {

            $fileUrl = $this->sponsorsModel->getFileUrl($uuid);
            unlink('assets/images/sponsors/' . $fileUrl['photo_url']);
            $this->sponsorsModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/sponsors'));
        }
    }
}
