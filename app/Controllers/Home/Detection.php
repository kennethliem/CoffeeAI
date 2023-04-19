<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;
use App\Models\SponsorsModel;

class Detection extends BaseController
{
    protected $appInfoModel;
    protected $appFeatureModel;
    protected $beanDirectoryModel;
    protected $contentsModel;
    protected $faqModel;
    protected $sponsorsModel;
    protected $teamsModel;

    public function __construct()
    {
        $this->appInfoModel = new AppInfoModel();
        $this->sponsorsModel = new SponsorsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'CoffeeAI - Detection',
            'information' => $this->appInfoModel->getAppInformation(),
            'sponsors' => $this->sponsorsModel->getSponsors(),
        ];

        if ($this->request->getMethod() == 'post') {
            helper(['form']);

            $file = $this->request->getFile('image');
            $fileName = $file->getRandomName();
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(WRITEPATH . 'images/uploads/', $fileName);

                // Using native PHP Curl library
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://127.0.0.1:5000/api/detection',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('image' => new \CURLFile(WRITEPATH . 'images/uploads/' . $fileName)),
                ));
                $response = curl_exec($curl);
                if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
                    $data['response'] = json_decode($response, true);
                    unlink(WRITEPATH . 'images/uploads/' . $fileName);
                    session()->setFlashdata('success', $data['response']['coffeeType']);
                    return redirect()->to(base_url('/detection'))->withInput();
                } else {
                    session()->setFlashdata('error', 'Internal server error, please try again');
                    return redirect()->to(base_url('/detection'))->withInput();
                }
            } else {
                session()->setFlashdata('error', 'Upload error, please try again');
                return redirect()->to(base_url('/detection'))->withInput();
            }
        } else {
            return view('homepage/detection', $data);
        }
    }
}
