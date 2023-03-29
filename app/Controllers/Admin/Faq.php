<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class Faq extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Frequently Asked Questions',
            'faqs' => $this->faqModel->getFaq()
        ];

        return view('admin/faq', $data);
    }

    public function detail($getData)
    {
        $data = [
            'faq' => $this->faqModel->getFaq($getData),
        ];
        return view('admin/modal/edit/faq', $data);
    }

    public function add()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'question' => 'required',
                'answer' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/faqs'));
            } else {
                $this->faqModel->save([
                    'uuid' => $uuid->uuid4()->toString(),
                    'question' => htmlspecialchars($this->request->getVar('question')),
                    'answer' => htmlspecialchars($this->request->getVar('answer')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data berhasil ditambah');
                return redirect()->to(base_url('admin/faqs'));
            }
        }
    }

    public function update($uuid)
    {
        helper(['form']);
        if ($this->request->getMethod() == 'put') {

            $rules = [
                'question' => 'required',
                'answer' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('admin/faqs'));
            } else {
                $this->faqModel->save([
                    'uuid' => $uuid,
                    'question' => htmlspecialchars($this->request->getVar('question')),
                    'answer' => htmlspecialchars($this->request->getVar('answer')),
                    'last_modified_by' => session()->get('full_name'),
                ]);
                session()->setFlashdata('success', 'Data updated');
                return redirect()->to('admin/faqs')->withInput();
            }
        }
    }

    public function delete($uuid)
    {
        if ($this->request->getMethod() == 'delete') {
            $this->faqModel->delete($uuid);
            session()->setFlashdata('success', 'Data deleted successfuly.');
            return redirect()->to(base_url('admin/faqs'));
        }
    }
}
