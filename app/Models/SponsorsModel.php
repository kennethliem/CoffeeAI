<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class SponsorsModel extends UuidModel
{
    protected $table = 'sponsors';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'sponsor_name', 'photo_url', 'photo_alternate', 'last_modified_by'];

    public function getSponsors($uuid = false)
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
