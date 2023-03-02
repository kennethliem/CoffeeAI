<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WorkingTeams extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'person_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'uuid'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
            ],
            'fullname'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '120'
            ],
            'position'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50'
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
        $this->forge->addKey('person_id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('working_teams', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('working_teams');
    }
}
