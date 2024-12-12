<?php

namespace App\Controllers;

use App\Models\AddressModel;

class AddressController extends BaseController
{
    // Show the form to create a new address
   // Show the form to create a new address
public function create()
{
    return view('address');  // Change 'address/create' to 'address'
}

// Show the list of addresses
public function Address()
{
    $model = new AddressModel();

    // Get all addresses
    $data['addresses'] = $model->findAll();

    return view('address', $data);  // Change 'address/create' to 'address'
}

    // Store a new address in the database
    public function store()
    {
        $model = new AddressModel();

        // Get data from the form input
        $data = [
            'full_name'    => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address'      => $this->request->getPost('address'),
            'city'         => $this->request->getPost('city'),
            'state'        => $this->request->getPost('state'),
            'zip_code'     => $this->request->getPost('zip_code'),
        ];

        // Validate the data
        if (!$this->validate([
            'full_name'    => 'required|min_length[3]|max_length[255]',
            'phone_number' => 'required|min_length[10]|max_length[20]',
            'address'      => 'required|min_length[10]',
            'city'         => 'required|min_length[3]|max_length[100]',
            'state'        => 'required|min_length[3]|max_length[100]',
            'zip_code'     => 'required|min_length[5]|max_length[20]',
        ])) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Insert the address into the database
        $model->save($data);

        // Redirect after saving
        return redirect()->to('/address')->with('success', 'Address created successfully');
    }

    // Show the list of addresses

    // Show the form to edit an address
    public function edit($id)
    {
        $model = new AddressModel();
        
        // Get the address by ID
        $address = $model->find($id);
        
        if (!$address) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Address not found');
        }
        
        // Return the address data as JSON
        return $this->response->setJSON(['address' => $address]);
    }
    
    
    // Update an address in the database
    public function update($id)
    {
        $model = new AddressModel();
    
        // Get data from the form input
        $data = [
            'full_name'    => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address'      => $this->request->getPost('address'),
            'city'         => $this->request->getPost('city'),
            'state'        => $this->request->getPost('state'),
            'zip_code'     => $this->request->getPost('zip_code'),
        ];
    
        // Validate the data
        if (!$this->validate([
            'full_name'    => 'required|min_length[3]|max_length[255]',
            'phone_number' => 'required|min_length[10]|max_length[20]',
            'address'      => 'required|min_length[10]',
            'city'         => 'required|min_length[3]|max_length[100]',
            'state'        => 'required|min_length[3]|max_length[100]',
            'zip_code'     => 'required|min_length[5]|max_length[20]',
        ])) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Update the address in the database
        $model->update($id, $data);
    
        // Redirect after updating
        return redirect()->to('/address')->with('success', 'Address updated successfully');
    }
    
    // Delete an address from the database
    public function removeAddress($id)
    {
        $model = new AddressModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    // Fetch all addresses
    public function fetchAddresses()
    {
        $model = new AddressModel();
        $addresses = $model->findAll();

        // Return the data as JSON
        return $this->response->setJSON($addresses);
    }
}
