<?php
namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table      = 'shipping_address';  // Name of the table
    protected $primaryKey = 'id';                // Primary key
    protected $allowedFields = ['full_name', 'phone_number', 'address', 'city', 'state', 'zip_code', 'user_id']; // Columns you want to allow for CRUD
    
    // Enable automatic timestamp handling
    protected $useTimestamps = true;

    // Set the name of the fields for created_at and updated_at if not following the default names
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
