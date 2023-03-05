<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModelVersions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'model_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'version'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
            ],
            'model_location'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
            'is_active'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('uuid', TRUE);

        // Membuat tabel news
        $this->forge->createTable('model_versions', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('model_versions');
    }
}
