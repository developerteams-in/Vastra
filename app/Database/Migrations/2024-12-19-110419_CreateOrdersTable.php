<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        // Create the orders table
        $this->forge->addField([
            'id'           => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'user_id'      => [
                'type'       => 'INT',
                'unsigned'  => true,
            ],
            'productName'  => [ // Changed to productName
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'order_date'   => [ // Changed from order_data to order_date with DATETIME type
                'type'       => 'DATETIME',  // For both date and time
            ],
            'total_price'   => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status'        => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at'    => [
                'type' => 'DATETIME',
            ],
            'updated_at'    => [
                'type' => 'DATETIME',
            ],
        ]);
        
        // Set primary key
        $this->forge->addKey('id', true);

        // Create the table
        $this->forge->createTable('orders');
    }

    public function down()
    {
        // Drop the orders table
        $this->forge->dropTable('orders');
    }
}

