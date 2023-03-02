<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AppFeatures extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'feature_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'feature_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'feature_decsription'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'icon_url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'icon_alternate'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
            'last_modified_by'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('feature_id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('app_features', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('app_features');
    }
}
