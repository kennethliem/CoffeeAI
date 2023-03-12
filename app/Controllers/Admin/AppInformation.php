<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;

class AppInformation extends BaseController
{
    protected $appInfoModel;

    public function __construct()
    {
        $this->appInfoModel = new AppInfoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Application Informations',
            'app' => $this->appInfoModel->getAppInformation()
        ];
        return view('admin/app_information', $data);
    }

    public function update($uuid)
    {
        if ($this->request->getMethod() == 'put') {
            $this->appInfoModel->save([
                'uuid' => $uuid,
                'app_name' => htmlspecialchars($this->request->getVar('app_name')),
                'app_description' => htmlspecialchars($this->request->getVar('app_description')),
                'app_copyright' => htmlspecialchars($this->request->getVar('app_copyright')),
                'count_happy_users' => htmlspecialchars($this->request->getVar('count_happy_users')),
                'count_total_datasets' => htmlspecialchars($this->request->getVar('count_total_datasets')),
                'last_model_accuracy' => htmlspecialchars($this->request->getVar('last_model_accuracy')),
                'app_address' => htmlspecialchars($this->request->getVar('app_address')),
                'app_phone_number' => htmlspecialchars($this->request->getVar('app_phone_number')),
                'app_email' => htmlspecialchars($this->request->getVar('app_email')),
                'app_operational_hours' => htmlspecialchars($this->request->getVar('app_operational_hours')),
                'last_modified_by' => session()->get('full_name'),
            ]);
            session()->setFlashdata('success', 'Data updated');
            return redirect()->to(base_url('admin/information'));
        }
    }
}
