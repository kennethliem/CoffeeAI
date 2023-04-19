<?php

namespace App\Controllers\Home;

use App\Models\RequestHistoryModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ApiDetection extends ResourceController
{
    use ResponseTrait;

    protected $requestHistoryModel;
    public function __construct()
    {
        $this->requestHistoryModel = new RequestHistoryModel();
    }

    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            helper(['form']);
            $file = $this->request->getFile('image');
            $header = $this->request->getHeaderLine("Authorization");

            $key = getenv('JWT_SECRET');
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $decoded = json_decode(json_encode($decoded), true);

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
                $requestCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if ($requestCode == 200) {
                    $result = json_decode($response, true);
                    $this->requestHistoryModel->save([
                        'email' => $decoded['email'],
                        'code' => 200,
                        'result' => $result['coffeeType'],
                        'is_error' => 0,
                        'through' => 'API'
                    ]);
                    unlink(WRITEPATH . 'images/uploads/' . $fileName);
                    return $this->respond($result);
                } else {
                    return $this->respond($this->getError("Internal server error, please try again", $decoded['email'], $requestCode));
                }
            } else {
                return $this->respond($this->getError("Can't get Image file, please try again", $decoded['email'], 500));
            }
        } else {
            return $this->respond($this->getError("Wrong Method"));
        }
        return $this->respond();
    }

    public function getError($message, $email = "-", $code = 001)
    {
        $data['coffeeType'] = null;
        $data['error'] = true;
        $data['message'] = $message;
        $this->requestHistoryModel->save([
            'email' => $email,
            'code' => $code,
            'result' => $message,
            'is_error' => 1,
            'through' => 'API'
        ]);
        return $data;
    }
}
