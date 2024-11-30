<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table      = 'favorites';  // Table name
    protected $primaryKey = 'id';         // Primary key

    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Change to 'object' or 'App\Entities\EntityName' if using entities

    protected $allowedFields = [
        'productName',
        'productDescription',
        'productPrice',
        'productCategory',
        'productImage',
    ];
}
