<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\ClientsModel;
use Firebase\JWT\JWT;

class Auth extends BaseController
{
    protected $clientsModel;
    public function __construct()
    {
        $this->clientsModel = new ClientsModel();
    }

    public function signin()
    {
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
                $key = getenv('JWT_SECRET');
                $iat = time();
                $exp = $iat + 3600;

                $payload = array(
                    "iss" => "COFFEEAI",
                    "sub" => "Api for detection feature",
                    "iat" => $iat,
                    "exp" => $exp,
                    "email" => $this->request->getVar('email'),
                );
                $jwt = JWT::encode($payload, $key, 'HS256');
                $user = $this->clientsModel->where('email', $this->request->getVar('email'))->first();
                $data = [
                    'token' => $jwt,
                ];
                $user = $user + $data;
                $this->setUserSession($user);
                return redirect()->to(base_url('/detection'));
            }
        } else {
            return view('auth/user_signin', $data);
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
