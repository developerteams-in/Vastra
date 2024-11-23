<?php
// app/Models/OrderModel.php
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'status', 'total_price']; // Adjust fields based on your schema

    // Optionally, define relationships or custom methods
}
