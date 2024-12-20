<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // Your table name
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'productName', 'order_date', 'total_price', 'status', 'created_at', 'updated_at'
    ];

    // Optional: Set the return type to an array (usually defaults to array)
    protected $returnType = 'array';
}
