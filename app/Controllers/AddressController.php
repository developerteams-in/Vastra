<?php

namespace App\Controllers;

use App\Models\AddressModel;
use App\Models\CartModel;

class AddressController extends BaseController
{
    protected $addressModel;
    protected $cartModel;

    public function __construct()
    {
        // Initialize the models
        $this->addressModel = new AddressModel();
        $this->cartModel = new CartModel(); // Add CartModel initialization
    }
    
    // Show the form to create a new address
    public function create()
    {
        return view('address');
    }

    // Display user addresses and calculate the total price from the cart
    public function address()
    {
        $userId = session()->get('user')['id'];
        
        // Fetch user's addresses
        $addresses = $this->addressModel->where('user_id', $userId)->findAll();
        
        // Calculate the total price from the cart
        $cartItems = $this->cartModel->where('user_id', $userId)->findAll();
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cartItems as $item) {
            if (isset($item['product_price'], $item['quantity'])) {
                $totalPrice += $item['product_price'] * $item['quantity'];
                $totalQuantity += $item['quantity'];
            }
        }

        // Return the view with the addresses and totalPrice
        return view('address', [
            'addresses' => $addresses,
            'totalPrice' => $totalPrice, // Ensure we pass totalPrice
            'totalQuantity' => $totalQuantity, // Add totalQuantity
        ]);
    }

    // Store a new address in the database
    public function store()
    {
        $userId = session()->get('user')['id'];

        // Get form data
        $data = [
            'full_name'    => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address'      => $this->request->getPost('address'),
            'city'         => $this->request->getPost('city'),
            'state'        => $this->request->getPost('state'),
            'zip_code'     => $this->request->getPost('zip_code'),
            'user_id'      => $userId,
        ];

        // Check if saving address fails
        if (!$this->addressModel->save($data)) {
            log_message('error', json_encode($this->addressModel->errors()));
            return redirect()->back()->with('error', 'Failed to save address.');
        }

        return redirect()->to('/address')->with('success', 'Address created successfully.');
    }

    // Show the form to edit an address
    public function edit($id)
    {
        $address = $this->addressModel->find($id);

        // Handle case where address not found
        if (!$address) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Address not found with id: $id");
        }

        return view('edit_address', compact('address'));
    }

    // Update an address
    public function update($id)
    {
        $data = $this->request->getPost([
            'full_name', 'phone_number', 'address', 'city', 'state', 'zip_code'
        ]);

        // Perform update in the database
        if (!$this->addressModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update address.');
        }

        return redirect()->to('/address')->with('success', 'Address updated successfully.');
    }

    // Remove an address
    public function removeAddress($id)
    {
        $isDeleted = $this->addressModel->delete($id);

        // Check if address was deleted
        if ($isDeleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete address.']);
        }
    }
}
