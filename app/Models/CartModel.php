<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table      = 'cart_items';   // Table name
    protected $primaryKey = 'id';           // Primary key

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';  // Returns data as an array

    protected $allowedFields = [
        'productName',
        'productDescription',
        'productPrice',
        'productCategory',
        'productImage',
        'created_at',
        'updated_at',
    ];

    // Enable automatic handling of created_at and updated_at
    protected $useTimestamps = true;
}
