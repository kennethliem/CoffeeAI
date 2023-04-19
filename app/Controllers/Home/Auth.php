<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\ClientsModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends BaseController
{
    protected $clientsModel;
    public function __construct()
    {
        $this->clientsModel = new ClientsModel();
    }

    public function signin()
    {
        $key = getenv('JWT_SECRET');
        $data = [
            'title' => 'User Login - CoffeeAI',
            'validation' => \Config\Services::validation(),
        ];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[3]|max_length[50]|valid_email',
                'password' => 'required|min_length[3]|max_length[255]|validateClient[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateClient' => 'Email or Password don\'t match'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to(base_url('/signin'))->withInput();
            } else {
                $email = $this->request->getVar('email');
                $user = $this->clientsModel->where('email', $email)->first();
                if ($user['token'] == null) {
                    $user['token'] = $this->getUserToken($email, $key);
                    $this->clientsModel->save([
                        'uuid' => $user['uuid'],
                        'token' => $user['token']
                    ]);
                }

                $this->setUserSession($user);
                return redirect()->to(base_url('/detection'));
            }
        } else {
            return view('auth/user_signin', $data);
        }
    }

    public function regenerateToken()
    {
        $key = getenv('JWT_SECRET');
        $newToken = $this->getUserToken(session()->get('email'), $key);
        $this->clientsModel->save([
            'uuid' => session()->get('uuid'),
            'token' => $newToken
        ]);
        session()->set([
            'token' => $newToken
        ]);
        session()->setFlashdata('success', 'Token has been regenerated');
        return redirect()->to(base_url('/detection'));
    }

    private function getUserToken($email, $key)
    {
        $iat = time();
        $exp = $iat + 604800;
        $payload = array(
            "iss" => "CoffeeAI-BackendSystem",
            "iat" => $iat,
            "exp" => $exp,
            "email" => $email,
        );
        return JWT::encode($payload, $key, 'HS256');
    }

    public function getTokenDetail()
    {
        $key = getenv('JWT_SECRET');
        helper('time');
        $data = [
            'tokenExpired' => secondsToTime($this->getTokenExpTime(session()->get('token'), $key))
        ];
        return view('homepage/modal/TokenPopUp', $data);
    }

    public function getTokenExpTime($token, $key)
    {
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            $decoded = json_decode(json_encode($decoded), true);
            return $decoded['exp'] - time();
        } catch (Exception $ex) {
            return "Your Token Has been expired, please regenerate.";
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'uuid' => $user['uuid'],
            'fullname' => $user['fullname'],
            'email' => $user['email'],
            'token' => $user['token'],
            'isLoggedInClient' => true,
        ];
        session()->set($data);
        return true;
    }

    public function signup()
    {
        $data = [];
        helper('form');
        $uuid = service('uuid');

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fullname' => 'required|min_length[3]|max_length[30]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                session()->setFlashdata('error', $data['validation']->listErrors());
                return redirect()->to('/signup');
            } else {
                $newData = [
                    'uuid' => $uuid->uuid4()->toString(),
                    'fullname' => htmlspecialchars($this->request->getVar('fullname')),
                    'email' => htmlspecialchars($this->request->getVar('email')),
                    'password_hash' => htmlspecialchars($this->request->getVar('password')),
                ];
                $this->clientsModel->save($newData);
                session()->setFlashdata('success', 'User successfully registered, please login');
                return redirect()->to(base_url('/signin'));
            }
        } else {
            return view('auth/user_signup');
        }
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
