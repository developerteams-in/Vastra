<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
                'unique'         => true, // Ensure email is unique
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255', // Enough space to store hashed passwords
                'null'           => false,
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'default'        => 'user', // Default role is 'user'
                'null'           => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');  // Drop the entire table
    }
}
