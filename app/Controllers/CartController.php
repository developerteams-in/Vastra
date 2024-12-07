<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        // Load the main cart view
        $session = session();
        $cart = $session->get('cart') ?? []; // Get current cart from session
        return view('cart', ['cart' => $cart]); // Pass cart data to the view
    }

    public function add()
    {
        // Get data from POST request
        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productQuantity = $this->request->getPost('product_quantity');
        $selectedSizes = $this->request->getPost('selected_sizes');

        $session = session();
        if (!$session->has('cart')) {
            $session->set('cart', []);
        }

        // Prepare product data
        $productData = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $productQuantity,
            'sizes' => $selectedSizes,
        ];

        $cart = $session->get('cart');
        $cart[] = $productData; // Add product to cart
        $session->set('cart', $cart);

        return $this->response->setJSON([
            'message' => 'Product added to cart successfully!',
            'cart' => $cart,
        ]);
    }
}
