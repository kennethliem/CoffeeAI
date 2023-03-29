<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'description'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'thumbnail_url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'thumbnail_alternate'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'content_url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
        $this->forge->createTable('contents', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('contents');
    }
}
