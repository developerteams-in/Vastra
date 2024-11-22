<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';  // Replace with your table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'otp', 'otp_expiry'];

    // Add any necessary validation rules or additional methods
}
