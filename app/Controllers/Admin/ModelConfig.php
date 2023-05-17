<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DLConfigModel;

class ModelConfig extends BaseController
{

    protected $dlConfigModel;

    public function __construct()
    {
        $this->dlConfigModel = new DLConfigModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Deep Learning Model Configuration',
            'models' => $this->dlConfigModel->getModelConfig()
        ];
        return view('admin/model_config', $data);
    }

    public function retrain()
    {
        helper(['form']);
        $uuid = service('uuid');
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('datasets');
            $fileName = $_FILES['datasets']['name'];
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(WRITEPATH . 'datasets/uploads/', $fileName);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://localhost:8000/api/retrain/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('datasets' => new \CURLFile(WRITEPATH . 'datasets/uploads/' . $fileName)),
                ));
                $response = curl_exec($curl);
                $requestCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                if ($requestCode == 200) {
                    $data['response'] = json_decode($response, true);
                    $result = $data['response']['error'];
                    if ($result == false) {
                        $this->dlConfigModel->save([
                            'uuid' => $uuid->uuid4()->toString(),
                            'model_name' => htmlspecialchars($this->request->getVar('name')),
                            'version' => htmlspecialchars($this->request->getVar('version')),
                            'updated_by' => session()->get('full_name'),
                        ]);
                        unlink(WRITEPATH . 'datasets/uploads/' . $fileName);
                        session()->setFlashdata('success', $data['response']['message']);
                        return redirect()->to(base_url('admin/modelconfig'));
                    } else {
                        unlink(WRITEPATH . 'datasets/uploads/' . $fileName);
                        session()->setFlashdata('error', 'Internal server error');
                        return redirect()->to(base_url('admin/modelconfig'));
                    };
                } else {
                    unlink(WRITEPATH . 'datasets/uploads/' . $fileName);
                    session()->setFlashdata('error', 'Retrain request failed');
                    return redirect()->to(base_url('admin/modelconfig'));
                }
            } else {
                session()->setFlashdata('error', 'File not found');
                return redirect()->to(base_url('admin/modelconfig'))->withInput();
            }
        } else {
            return redirect()->to(base_url('admin/modelconfig'))->withInput();;
        }
    }
}
