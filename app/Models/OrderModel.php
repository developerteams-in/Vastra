<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';  // The table name
    protected $primaryKey = 'id';  // Define the primary key
    protected $allowedFields = [
        'user_id', 
        'productName', 
        'order_data',  
        'total_price', 
        'status', 
        'created_at',  // CI4 auto-manages this field
        'updated_at'   // CI4 auto-manages this field
    ];

    // Use CodeIgniter's built-in timestamp functionality for 'created_at' and 'updated_at' fields
    protected $useTimestamps = true;  // Enable auto-timestamp management
    protected $createdField  = 'created_at';  // Field for creation timestamp
    protected $updatedField  = 'updated_at';  // Field for update timestamp
}
