<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class FaqModel extends UuidModel
{
    protected $table = 'faqs';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'question', 'answer', 'last_modified_by'];

    public function getFaq($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }
}
