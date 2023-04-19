<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestHistoryModel extends Model
{
    protected $table = 'request_history';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'code', 'result', 'is_error', 'through'];

    public function getHistory($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
