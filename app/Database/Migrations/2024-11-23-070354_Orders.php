<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        // Create orders table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, // Ensure it's unsigned
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'pending', // Default order status is 'pending'
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,  // Allow null for created_at
                'default' => null, // No default value set
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        // Set the primary key for the table
        $this->forge->addPrimaryKey('id');
        
        // Create the foreign key constraint
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        
        // Create the table in the database
        $this->forge->createTable('orders');
    }

    public function down()
    {
        // Drop the orders table
        $this->forge->dropTable('orders');
    }
}
