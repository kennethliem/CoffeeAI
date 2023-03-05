<?php

namespace App\Models;

use CodeIgniter\Model;
use Michalsn\Uuid\UuidModel;

class AdminModel extends UuidModel
{
    protected $table = 'users';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'email', 'full_name', 'phone', 'password_hash', 'token', 'role', 'token', 'updated_by', 'is_active'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpddate = ['beforeUpdate'];

    public function getUsers($uuid = false)
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
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
