<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class CartItems extends Migration
{
    public function up()
    {
        // Creating the 'cart_items' table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'product_id'  => [
                'type'           => 'INT',
                'unsigned'      => true,
            ],
            'quantity'    => [
                'type'           => 'INT',
                'default'        => 1,
            ],
            'user_id'     => [
                'type'           => 'INT',
                'unsigned'      => true,
            ],
            'created_at'  => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ],
            'updated_at'  => [
                'type'           => 'TIMESTAMP',
                'on update'      => 'CURRENT_TIMESTAMP',
                'null'           => true,
            ],
        ]);
        
        // Adding primary key
        $this->forge->addPrimaryKey('id');

        // Creating the table
        $this->forge->createTable('cart_items');
    }

    public function down()
    {
        // Drop the 'cart_items' table
        $this->forge->dropTable('cart_items');
    }
}