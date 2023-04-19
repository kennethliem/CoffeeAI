<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContentsModel;

class PageContent extends BaseController
{
    protected $contentsModel;

    public function __construct()
    {
        $this->contentsModel = new ContentsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Page Content',
            'contents' => $this->contentsModel->getContents()
        ];

        return view('admin/page_content', $data);
    }

    public function detail($getData)
    {
        $data = [
            'content' => $this->contentsModel->getContents($getData),
        ];
        return view('admin/modal/edit/content', $data);
    }

    public function add()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'thumbnailAlternate' => 'required',
                'contentUrl' => 'required',
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
                return redirect()->to(base_url('admin/contents'));
            } else {
                $fileThumbnail = $this->request->getFile('thumbnail');
                $nameThumbnail = $fileThumbnail->getRandomName();
                $fileThumbnail->move('assets/images/contents', $nameThumbnail);

                $this->contentsModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'title' => htmlspecialchars($this->request->getVar('title')),
                    'description' => htmlspecialchars($this->request->getVar('description')),
                    'thumbnail_alternate' => htmlspecialchars($this->request->getVar('thumbnailAlternate')),
                    'content_url' => htmlspecialchars($this->request->getVar('contentUrl')),
                    'thumbnail_url' => $nameThumbnail,
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/contents'));
            }
        }
    }

    public function update($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'thumbnailAlternate' => 'required',
                'contentUrl' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/contents'));
            } else {
                $fileThumbnail = $this->request->getFile('thumbnail');

                if ($fileThumbnail->getError() == 4) {
                    $nameThumbnail = $this->request->getVar('old_thumbnail');
                } else {
                    $fileUrl = $this->contentsModel->getFileUrl($uuid);
                    unlink('assets/images/contents/' . $fileUrl['thumbnail_url']);

                    $nameThumbnail = $fileThumbnail->getRandomName();
                    $fileThumbnail->move('assets/images/contents', $nameThumbnail);
                }
                $this->contentsModel->save([
                    'uuid' => $uuid,
                    'title' => htmlspecialchars($this->request->getVar('title')),
                    'description' => htmlspecialchars($this->request->getVar('description')),
                    'thumbnail_alternate' => htmlspecialchars($this->request->getVar('thumbnailAlternate')),
                    'content_url' => htmlspecialchars($this->request->getVar('contentUrl')),
                    'thumbnail_url' => $nameThumbnail,
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/contents')->withInput();
            }
        }
    }

    public function delete($uuid)
    {
        if ($this->request->getMethod() == 'delete') {

            $fileUrl = $this->contentsModel->getFileUrl($uuid);
            unlink('assets/images/contents/' . $fileUrl['thumbnail_url']);
            $this->contentsModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/contents'));
        }
    }
}
