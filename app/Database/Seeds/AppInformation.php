<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppInformation extends Seeder
{
    public function run()
    {
        $data = [
            'app_name' => 'CoffeeAI',
            'app_description ' => '',
            'app_copyright' => 'CoffeeAI 2023',
            'count_happy_users' => '0',
            'count_total_datasets' => '0',
            'last_model_accuracy' => '0',
            'app_address' => 'Gading Serpong, Tangerang, Indonesia',
            'app_phone_number' => '0811202604',
            'app_email' => 'hello@coffeeai.online',
            'app_operational_hours' => 'Monday - Friday 9:00AM - 05:00PM',
            'updated_at' => '2023-03-12 05:17:08',
            'last_modified_by' => 'Seeders',
        ];

        $this->db->table('app_informations')->insert($data);
    }
}
