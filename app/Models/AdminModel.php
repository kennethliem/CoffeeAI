<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'email', 'fullname', 'password_hash', 'token', 'role', 'token', 'updated_by', 'is_active'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpddate = ['beforeUpdate'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $id])->first();
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
