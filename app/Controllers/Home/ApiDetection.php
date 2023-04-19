<?php

namespace App\Controllers\Home;

use App\Models\AdminModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiDetection extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form']);
            $file = $this->request->getFile('image');

            if ($file != null && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
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
                    unlink(WRITEPATH . 'images/uploads/' . $fileName);
                    return $this->respond(json_decode($response, true));
                } else {
                    $data['coffeeType'] = null;
                    $data['error'] = true;
                    $data['message'] = "Internal server error, please try again" . curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    return $this->respond($data);
                }
            } else {
                $data['coffeeType'] = null;
                $data['error'] = true;
                $data['message'] = "Can't get Image file, please try again";
                return $this->respond($data);
            }
        } else {
            $data['coffeeType'] = null;
            $data['error'] = true;
            $data['message'] = "Wrong method";
            return $this->respond($data);
        }
        return $this->respond();
    }
}
