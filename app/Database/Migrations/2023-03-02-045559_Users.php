<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => [
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
            'full_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '120'
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
            'is_active'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('user_id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
