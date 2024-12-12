<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ShippingAddress extends Migration
{
    public function up()
    {
        // Define the fields for the 'shipping_address' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'address' => [
                'type'       => 'TEXT',
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'zip_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
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

        // Add primary key
        $this->forge->addKey('id', true);

        // Create the 'shipping_address' table
        $this->forge->createTable('shipping_address');
    }

    public function down()
    {
        // Drop the 'shipping_address' table if rolling back
        $this->forge->dropTable('shipping_address');
    }
}
