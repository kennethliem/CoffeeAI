<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'fullname'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'password_hash'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'token'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('uuid', TRUE);

        // Membuat tabel news
        $this->forge->createTable('clients', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
