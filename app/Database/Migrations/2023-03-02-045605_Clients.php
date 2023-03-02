<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ],
            'password_hash'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'token_hash'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'token_exp'       => [
                'type'           => 'DATE'
            ],
            'created_at'       => [
                'type'           => 'DATETIME'
            ],
            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
            'is_active'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('client_id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('clients', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
