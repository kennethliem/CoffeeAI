<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sponsors extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'sponsor_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '120'
            ],
            'photo_url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'photo_alternate'       => [
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
        $this->forge->addKey('uuid', TRUE);

        // Membuat tabel news
        $this->forge->createTable('sponsors', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sponsors');
    }
}
