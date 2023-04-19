<?php

namespace App\Validation;

use App\Models\ClientsModel;

class ClientsRules
{
    public function validateClient(string $str, string $fields, array $data)
    {
        $model = new ClientsModel();
        $user = $model->where('email', $data['email'])->first();

        if (!$user)
            return false;

        return password_verify($data['password'], $user['password_hash']);
    }
}
