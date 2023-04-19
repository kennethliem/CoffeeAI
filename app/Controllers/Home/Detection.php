<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\AppInfoModel;
use App\Models\RequestHistoryModel;
use App\Models\SponsorsModel;

class Detection extends BaseController
{
    protected $appInfoModel;
    protected $sponsorsModel;
    protected $requestHistoryModel;

    public function __construct()
    {
        $this->appInfoModel = new AppInfoModel();
        $this->sponsorsModel = new SponsorsModel();
        $this->requestHistoryModel = new RequestHistoryModel();
    }

    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'CoffeeAI - Detection',
            'information' => $this->appInfoModel->getAppInformation(),
            'sponsors' => $this->sponsorsModel->getSponsors(),
        ];

        if ($this->request->getMethod() == 'post') {
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
                $requestCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if ($requestCode == 200) {
                    $data['response'] = json_decode($response, true);
                    $result = $data['response']['coffeeType'];
                    $this->requestHistoryModel->save([
                        'email' => session()->get('email'),
                        'code' => 200,
                        'result' => $result,
                        'is_error' => 0,
                        'through' => 'WEB'
                    ]);
                    unlink(WRITEPATH . 'images/uploads/' . $fileName);
                    session()->setFlashdata('coffeeType', $result);
                    return redirect()->to(base_url('/detection'))->withInput();
                } else {
                    unlink(WRITEPATH . 'images/uploads/' . $fileName);
                    session()->setFlashdata('error', $this->getError('Internal server error, please try again', session()->get('email'), $requestCode));
                    return redirect()->to(base_url('/detection'))->withInput();
                }
            } else {
                session()->setFlashdata('error', $this->getError('Upload error, please try again', session()->get('email'), 500));
                return redirect()->to(base_url('/detection'))->withInput();
            }
        } else {
            return view('homepage/detection', $data);
        }
    }


    public function getError($message, $email = "-", $code = 001)
    {
        $this->requestHistoryModel->save([
            'email' => $email,
            'code' => $code,
            'result' => $message,
            'is_error' => 1,
            'through' => 'WEB'
        ]);
        return $message;
    }
}
