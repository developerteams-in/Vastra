<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table      = 'shipping_address';  // Table name
    protected $primaryKey = 'id';  // Primary key

    // Define the allowed fields for the table
    protected $allowedFields = [
        'full_name',
        'phone_number',
        'address',
        'city',
        'state',
        'zip_code',
        'created_at',
        'updated_at'
    ];

    // Use timestamps for created_at and updated_at columns
    protected $useTimestamps = true;

    // Validation rules for the fields
    protected $validationRules = [
        'full_name'    => 'required|min_length[3]|max_length[255]',
        'phone_number' => 'required|min_length[10]|max_length[20]',
        'address'      => 'required|min_length[10]',
        'city'         => 'required|min_length[3]|max_length[100]',
        'state'        => 'required|min_length[3]|max_length[100]',
        'zip_code'     => 'required|min_length[5]|max_length[20]',
    ];

    // Validation messages for each field
    protected $validationMessages = [
        'full_name'    => ['required' => 'Full name is required'],
        'phone_number' => ['required' => 'Phone number is required'],
        'address'      => ['required' => 'Address is required'],
        'city'         => ['required' => 'City is required'],
        'state'        => ['required' => 'State is required'],
        'zip_code'     => ['required' => 'Zip code is required'],
    ];

    // Set the date format for created_at and updated_at (optional)
    protected $dateFormat = 'datetime';
}
