<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUsers extends Seeder
{
    public function run()
    {
        $data = [
            'uuid' => 'bb287301-c0a3-47f0-be85-7b58e304a39e',
            'email'    => 'kennethliem991@gmail.com',
            'full_name' => 'Kenneth Liem Hardadi',
            'phone' => '0811202604',
            'address' => 'Pabuaran Residence, Cluster Catleya C3-15',
            'password_hash' => '$2y$10$cN7LQfHhPY4.4E./3bCwGOjodtDLoUBLWbYeMYa8o40uK/kK1AZ76',
            'token' => '',
            'role' => '1',
            'created_at' => '2023-03-12 05:17:05',
            'updated_at' => '2023-03-12 05:17:08',
            'updated_by' => 'Seeders',
            'is_active' => 1,
        ];

        $this->db->table('users')->insert($data);
    }
}
