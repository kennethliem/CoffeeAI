<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faqs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'question'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'answer'       => [
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
        $this->forge->createTable('faqs', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('faqs');
    }
}
