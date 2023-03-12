<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class AppInfoModel extends UuidModel
{
    protected $table = 'app_informations';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['app_name', 'app_description', 'app_copyright', 'count_happy_users', 'count_total_datasets', 'last_model_accuracy', 'app_address', 'app_phone_number', 'app_email', 'app_operational_hours', 'last_modified_by'];

    public function getAppInformation()
    {
        return $this->findAll();
    }
}
