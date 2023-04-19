<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class ClientsModel extends UuidModel
{
    protected $table = 'clients';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'email', 'fullname', 'password_hash', 'token_hash', 'token_exp'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpddate = ['beforeUpdate'];

    public function getClients($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    public function verifyEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function verifyToken($token)
    {
        return $this->where(['token' => $token])->first();
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password_hash']))
            $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_DEFAULT);
        return $data;
    }
}
