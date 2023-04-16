<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class BeanDirectoryModel extends UuidModel
{
    protected $table = 'coffee_beans';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'name', 'class_name', 'type', 'description', 'photo_url', 'photo_alternate', 'last_modified_by'];

    public function getBeans($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }

    public function getFileUrl($uuid)
    {
        return $this->select('photo_url')->where(['uuid' => $uuid])->first();;
    }
}
