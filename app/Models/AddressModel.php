<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'shipping_address';
    protected $primaryKey = 'id';
    protected $allowedFields = ['full_name', 'phone_number','user_id', 'address', 'city', 'state', 'zip_code'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'full_name'    => 'required|min_length[3]|max_length[255]',
        'phone_number' => 'required|min_length[10]|max_length[20]',
        'address'      => 'required|min_length[10]',
        'city'         => 'required|min_length[3]|max_length[100]',
        'state'        => 'required|min_length[3]|max_length[100]',
        'zip_code'     => 'required|min_length[5]|max_length[20]',
    ];
}