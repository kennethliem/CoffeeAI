<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'code'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '3'
            ],
            'result'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'is_error'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'through'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '5'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('request_history', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('request_history');
    }
}
