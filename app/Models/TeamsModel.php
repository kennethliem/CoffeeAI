<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class TeamsModel extends UuidModel
{
    protected $table = 'working_teams';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'fullname', 'position', 'photo_url', 'photo_alternate', 'last_modified_by'];

    public function getTeams($uuid = false)
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
