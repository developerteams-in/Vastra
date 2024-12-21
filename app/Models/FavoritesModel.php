<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'productName', 'productDescription', 'productPrice', 'productCategory', 'productImage'];

    // Retrieve favorite products for a specific user
    public function getFavoritesByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}
