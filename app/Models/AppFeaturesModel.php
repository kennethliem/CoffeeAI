<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class AppFeaturesModel extends UuidModel
{
    protected $table = 'app_features';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'feature_name', 'feature_description', 'icon_url', 'icon_alternate', 'last_modified_by'];

    public function getAppFeatures($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }

    public function getFileUrl($uuid)
    {
        return $this->select('icon_url')->where(['uuid' => $uuid])->first();;
    }
}
