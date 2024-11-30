<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Favorites extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'productName' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'productDescription' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'productPrice' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2', // 10 digits in total, 2 decimal places
                'null'       => false,
            ],
            'productCategory' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'productImage' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Store image path or URL
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('favorites'); // Table name
    }

    public function down()
    {
        $this->forge->dropTable('favorites');
    }
}
