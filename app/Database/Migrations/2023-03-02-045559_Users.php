<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'full_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '120'
            ],
            'phone'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '15'
            ],
            'password_hash'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'token'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'role'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',

            'updated_at'       => [
                'type'           => 'DATETIME'
            ],
            'updated_by'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'is_active'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('uuid', TRUE);

        // Membuat tabel news
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
