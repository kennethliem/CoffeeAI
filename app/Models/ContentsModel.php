<?php

namespace App\Models;

use Michalsn\Uuid\UuidModel;

class ContentsModel extends UuidModel
{
    protected $table = 'contents';
    protected $primaryKey = 'uuid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'title', 'description', 'thumbnail_url', 'thumbnail_alternate', 'content_url', 'last_modified_by'];

    public function getContents($uuid = false)
    {
        if ($uuid == false) {
            return $this->findAll();
        }
        return $this->where(['uuid' => $uuid])->first();
    }

    public function getFileUrl($uuid)
    {
        return $this->select('thumbnail_url')->where(['uuid' => $uuid])->first();;
    }
}
