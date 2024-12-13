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
public function address()
    {
        $model = new AddressModel();

        // Assuming user_id is stored in session
        $userId = session()->get('user_id');

        // Fetch addresses specific to the user
        $data['addresses'] = $model->where('user_id', $userId)->findAll();

        return view('address', $data);
    }

    // Store a new address in the database
    public function store()
{
    $model = new AddressModel();

    $data = [
        'full_name'    => $this->request->getPost('full_name'),
        'phone_number' => $this->request->getPost('phone_number'),
        'address'      => $this->request->getPost('address'),
        'city'         => $this->request->getPost('city'),
        'state'        => $this->request->getPost('state'),
        'zip_code'     => $this->request->getPost('zip_code'),
     
    ];
    if (!$this->validate([
        'full_name'    => 'required|min_length[3]|max_length[255]',
        'phone_number' => 'required|min_length[10]|max_length[20]',
        'address'      => 'required|min_length[10]',
        'city'         => 'required|min_length[3]|max_length[100]',
        'state'        => 'required|min_length[3]|max_length[100]',
        'zip_code'     => 'required|min_length[5]|max_length[20]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    if (!$model->save($data)) {
        log_message('error', json_encode($model->errors())); // Log any errors
        return redirect()->back()->with('error', 'Failed to save address.');
    }

    return redirect()->to('/address')->with('success', 'Address created successfully.');
}

    // Show the list of addresses

    // Show the form to edit an address
    public function edit($id)
    {
        $model = new AddressModel();
        $address = $model->find($id);

        if (!$address) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Address not found.');
        }

        return view('address_page', ['address' => $address, 'editing' => true]);
    }

    public function update($id)
    {
        $model = new AddressModel();

        $data = $this->request->getPost([
            'full_name', 'phone_number', 'address', 'city', 'state', 'zip_code'
        ]);

        $validationRules = [
            'full_name'    => 'required|min_length[3]|max_length[255]',
            'phone_number' => 'required|min_length[10]|max_length[20]',
            'address'      => 'required|min_length[10]',
            'city'         => 'required|min_length[3]|max_length[100]',
            'state'        => 'required|min_length[3]|max_length[100]',
            'zip_code'     => 'required|min_length[5]|max_length[20]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, $data);

        return redirect()->to('/address')->with('success', 'Address updated successfully.');
    }

    public function delete($id)
    {
        $model = new AddressModel();

        if ($model->delete($id)) {
            return redirect()->to('/address')->with('success', 'Address deleted successfully.');
        } else {
            return redirect()->to('/address')->with('error', 'Failed to delete address.');
        }
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
    public function fetchAddress($id)
    {
        $model = new AddressModel();
        $address = $model->find($id);

        if (!$address) {
            return $this->response->setJSON(['error' => 'Address not found'], 404);
        }

        return $this->response->setJSON($address);
    }
}