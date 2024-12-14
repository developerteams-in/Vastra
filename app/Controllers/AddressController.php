<?php

namespace App\Controllers;

use App\Models\AddressModel;

class AddressController extends BaseController
{
    // Show the form to create a new address
    public function create()
    {
        return view('address');
    }
    protected $addressModel;

    public function __construct()
    {
        // Initialize the model
        $this->addressModel = new AddressModel();
    }public function address()
    {
        // Instantiate the AddressModel
        $model = new AddressModel();
        
        // Get the user_id from the session
        $userId = session()->get('user')['id'];
        
        // Retrieve the addresses for the specific user
        $data['addresses'] = $model->where('user_id', $userId)->findAll();
        
        // Pass the address data to the view
        return view('address', $data);
    }
    
    // Store a new address in the database
    public function store()
    {
        $model = new AddressModel();
        $userId = session()->get('user')['id'];

        $data = [
            'full_name'    => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address'      => $this->request->getPost('address'),
            'city'         => $this->request->getPost('city'),
            'state'        => $this->request->getPost('state'),
            'zip_code'     => $this->request->getPost('zip_code'),
            'user_id'      => $userId,
        ];
        // Directly remove validation for this field
        if (!$model->save($data)) {
            log_message('error', json_encode($model->errors()));
            return redirect()->back()->with('error', 'Failed to save address.');
        }

        return redirect()->to('/address')->with('success', 'Address created successfully.');
    }

    // Show the form to edit an address
    public function edit($id)
    {
        $address = $this->addressModel->find($id);
    
        if (!$address) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Address not found with id: $id");
        }
    
        return view('edit_address', compact('address'));
    }
    

    // Update an address
    public function update($id)
    {
        $model = new AddressModel();

        $data = $this->request->getPost([
            'full_name', 'phone_number', 'address', 'city', 'state', 'zip_code'
        ]);

        $model->update($id, $data);

        return redirect()->to('/address')->with('success', 'Address updated successfully.');
    }

    // Remove an address
    public function removeAddress($id)
    {
        $model = new AddressModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
}
