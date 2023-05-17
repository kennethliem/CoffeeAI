<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class DLConfigModel extends UuidModel
{
    protected $table = 'model_versions';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'model_name', 'version', 'updated_by'];

    public function getModelConfig()
    {
        return $this->findAll();
    }
}
