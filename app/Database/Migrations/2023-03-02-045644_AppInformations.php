<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AppInformations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'info_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'app_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'app_description'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'app_copyright'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'count_happy_users'       => [
                'type'           => 'INT',
                'constraint'     => 8
            ],
            'count_total_datasets'       => [
                'type'           => 'INT',
                'constraint'     => 8
            ],
            'last_model_accuracy'       => [
                'type'           => 'INT',
                'constraint'     => 3
            ],
            'app_address'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'app_phone_number'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '15'
            ],
            'app_email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '70'
            ],
            'app_operational_hours'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
            'last_modified_by'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('info_id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('app_informations', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('app_informations');
    }
}
