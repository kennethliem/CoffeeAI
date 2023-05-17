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

    public function countTotalRequest()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('request_history');
        $builder->select('(SELECT COUNT(id) FROM request_history) AS total_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE through = "WEB") AS web_total_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE is_error = 0 AND through = "WEB") AS web_success_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE is_error = 1 AND through = "WEB") AS web_error_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE through = "API") AS api_total_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE is_error = 0 AND through = "API") AS api_success_request', false);
        $builder->select('(SELECT COUNT(id) FROM request_history WHERE is_error = 1 AND through = "API") AS api_error_request', false);
        $query = $builder->get()->getRowArray();
        return $query;
    }

    public function weekReport()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('request_history');
        $where = "created_at > now() - INTERVAL 7 day";
        $builder->select('DATE(created_at) AS date, COUNT(id) AS total_request', false);
        $builder->where($where);
        $builder->groupBy('date');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function getRequestsError()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('request_history');
        $builder->select('result, COUNT(*) as total', false)->where('is_error', 1)->groupBy('result');
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
