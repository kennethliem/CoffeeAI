<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class ClientsModel extends UuidModel
{
    protected $table = 'clients';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'email', 'fullname', 'password_hash', 'token', 'regenerate_quota', 'updated_by'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpddate = ['beforeUpdate'];

    public function getClients($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }

    public function countTotalClients()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('clients');
        $builder->select('(SELECT COUNT(uuid) FROM clients) AS total_clients', false);
        $query = $builder->get()->getRowArray();
        return $query;
    }

    public function getClientsExcededQuota()
    {
        return $this->where(['regenerate_quota =' => 0])->findAll();
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

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password_hash']))
            $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_DEFAULT);
        return $data;
    }
}
