<?php

namespace App\Controllers\Home;

use App\Models\AdminModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiDetection extends ResourceController
{
    use ResponseTrait;

    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data['users'] = $this->adminModel->getUsers();
        return $this->respond($data);
    }

    public function create()
    {
        return $this->respondCreated();
    }

    public function show($id = null)
    {
        return $this->failNotFound('No employee found');
    }

    public function update($id = null)
    {
        return $this->respond();
    }

    public function delete($id = null)
    {
        return $this->failNotFound('No employee found');
    }
}
