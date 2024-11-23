<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        // Create the 'products' table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'productName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'productDescription' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'productPrice' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
            ],
            'productCategory' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'productImage' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            // Set default to CURRENT_TIMESTAMP but without strict mode
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => null, // Remove default value
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => null, // Remove default value
            ],
        ]);

        // Add the primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('products');
    }

    public function down()
    {
        // Drop the 'products' table if it exists
        $this->forge->dropTable('products');
    }
}
