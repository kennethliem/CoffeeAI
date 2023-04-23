<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;
use App\Models\ClientsModel;
use App\Models\RequestHistoryModel;
use Exception;
use PDO;

class Dashboard extends BaseController
{
    protected $appInfoModel;
    protected $clientsModel;
    protected $requestHistoryModel;

    public function __construct()
    {
        $this->appInfoModel = new AppInfoModel();
        $this->clientsModel = new ClientsModel();
        $this->requestHistoryModel = new RequestHistoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'app' => $this->appInfoModel->getAppInformation(),
            'countUser' => $this->clientsModel->countTotalClients(),
            'requests' => $this->requestHistoryModel->countTotalRequest(),
            'engine' => $this->checkEngine(),
            'reports' => $this->requestHistoryModel->weekReport(),
            'errors' => $this->requestHistoryModel->getRequestsError(),
        ];
        return view('admin/dashboard', $data);
    }

    public function checkEngine()
    {
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->request('GET', 'http://127.0.0.1:5000/api/check/');
            $response->getBody();
            $array = json_decode($response->getBody(), true);
        } catch (Exception) {
            $array = [
                'error' => true,
                'status' => "Offline",
                'message' => "Server disconnected"
            ];
        }
        return $array;
    }

    public function enableEngine()
    {

        $curl = curl_init();
        if (htmlspecialchars($this->request->getVar('setEnable')) ==  1) {
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:5000/api/check/enable',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('key' => 'CoffeeAI-IAeeffoC'),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        } else if (htmlspecialchars($this->request->getVar('setEnable')) ==  0) {
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:5000/api/check/disable',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('key' => 'CoffeeAI-IAeeffoC'),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }
        $array = json_decode($response, true);
        $requestCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($requestCode == 200) {
            if ($array['error'] == True) {
                session()->setFlashdata('error', $array['message']);
            } else {
                session()->setFlashdata('success', $array['message']);
            }
            return redirect()->to(base_url('/admin/dashboard'));
        }
        return redirect()->to(base_url('/admin/dashboard'));
    }
}
