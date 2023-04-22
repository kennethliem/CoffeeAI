<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClientsModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ClientInfo extends BaseController
{
    protected $clientsModel;
    public function __construct()
    {
        $this->clientsModel = new ClientsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Clients Management',
            'clients' => $this->clientsModel->getClients()
        ];
        return view('admin/client_info', $data);
    }

    public function resetQuota($uuid)
    {
        if ($this->request->getMethod() == 'put') {
            $this->clientsModel->save([
                'uuid' => $uuid,
                'regenerate_quota' => 5,
                'updated_by' => 'Admin : ' . session()->get('full_name')
            ]);
            session()->setFlashdata('success', 'Reset Success, remaining quota: 5');
            return redirect()->to(base_url('admin/clients'));
        }
    }

    public function generateToken($uuid)
    {
        if ($this->request->getMethod() == 'put') {
            $key = getenv('JWT_SECRET');
            $duration = $this->request->getVar('duration') * 86400;
            $user = $this->clientsModel->where('uuid', $uuid)->first();
            $newToken = $this->getUserToken("CoffeeAI-Admin", $user['email'], $key, $duration);
            $this->clientsModel->save([
                'uuid' => $uuid,
                'token' => $newToken,
                'updated_by' => 'Admin : ' . session()->get('full_name')
            ]);
            session()->setFlashdata('success', $user['fullname'] . ': The tokens will expire within ' . $this->request->getVar('duration') . ' Days');
            return redirect()->to(base_url('admin/clients'));
        }
    }

    private function getUserToken($issBy, $email, $key, $duration)
    {
        $iat = time();
        $exp = $iat + $duration;
        $payload = array(
            "iss" => $issBy,
            "iat" => $iat,
            "exp" => $exp,
            "email" => $email,
        );
        return JWT::encode($payload, $key, 'HS256');
    }

    public function getTokenDetail($uuid)
    {
        $key = getenv('JWT_SECRET');
        helper('time');
        $user = $this->clientsModel->where('uuid', $uuid)->first();
        $data = [
            'tokenExpired' => secondsToTime($this->getTokenExpTime($user['token'], $key)),
            'token' => $user['token'],
            'regeneration_quota' => $user['regenerate_quota']
        ];
        return view('admin/modal/detail/TokenPopUp', $data);
    }

    public function getTokenExpTime($token, $key)
    {
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $decoded = json_decode(json_encode($decoded), true);
            return $decoded['exp'] - time();
        } catch (Exception $ex) {
            return "Token Has been expired, please regenerate.";
        }
    }
}
