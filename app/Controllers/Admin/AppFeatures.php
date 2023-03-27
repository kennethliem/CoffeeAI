<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AppFeaturesModel;

class AppFeatures extends BaseController
{
    protected $appFeaturesModel;

    public function __construct()
    {
        $this->appFeaturesModel = new AppFeaturesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Application Features',
            'features' => $this->appFeaturesModel->getAppFeatures()
        ];

        return view('admin/app_features', $data);
    }

    public function detailFeature($getData)
    {
        $data = [
            'feature' => $this->appFeaturesModel->getAppFeatures($getData),
        ];
        return view('admin/modal/edit/feature', $data);
    }

    public function addFeature()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'featureName' => 'required',
                'featureDesc' => 'required',
                'iconAlternate' => 'required',
                'thumbnail' => [
                    'rules' => 'uploaded[thumbnail]|max_size[thumbnail,10000]|is_image[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]',
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
                $fileThumbnail = $this->request->getFile('thumbnail');
                $nameThumbnail = $fileThumbnail->getRandomName();
                $fileThumbnail->move('assets/images/features', $nameThumbnail);

                $this->appFeaturesModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'feature_name' => htmlspecialchars($this->request->getVar('featureName')),
                    'feature_description' => htmlspecialchars($this->request->getVar('featureDesc')),
                    'icon_alternate' => htmlspecialchars($this->request->getVar('iconAlternate')),
                    'icon_url' => $nameThumbnail,
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/features'));
            }
        }
    }

    public function updateFeature($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'featureName' => 'required',
                'featureDesc' => 'required',
                'iconAlternate' => 'required'
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/features'));
            } else {
                $fileThumbnail = $this->request->getFile('thumbnail');

                if ($fileThumbnail->getError() == 4) {
                    $nameThumbnail = $this->request->getVar('old_thumbnail');
                } else {
                    $fileUrl = $this->appFeaturesModel->getFileUrl($uuid);
                    unlink('assets/images/features/' . $fileUrl['icon_url']);

                    $nameThumbnail = $fileThumbnail->getRandomName();
                    $fileThumbnail->move('assets/images/features', $nameThumbnail);
                }
                $this->appFeaturesModel->save([
                    'uuid' => $uuid,
                    'feature_name' => htmlspecialchars($this->request->getVar('featureName')),
                    'feature_description' => htmlspecialchars($this->request->getVar('featureDesc')),
                    'icon_alternate' => htmlspecialchars($this->request->getVar('iconAlternate')),
                    'icon_url' => $nameThumbnail,
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/features')->withInput();
            }
        }
    }

    public function deleteFeature($uuid)
    {
        if ($this->request->getMethod() == 'delete') {

            $fileUrl = $this->appFeaturesModel->getFileUrl($uuid);
            unlink('assets/images/features/' . $fileUrl['icon_url']);
            $this->appFeaturesModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/features'));
        }
    }
}
