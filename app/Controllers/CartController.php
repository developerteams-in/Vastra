<?php

namespace App\Controllers;

use App\Models\CartModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        // Fetch cart items
        $cartItems = $this->cartModel->getCartItems();
        
        // Pass data to view
        return view('cart', ['cartItems' => $cartItems]);
    }

    public function remove($id)
    {
        // Remove item from cart
        $this->cartModel->removeFromCart($id);
        return redirect()->to('/cart');
    }

    public function updateQuantity()
    {
        // Update item quantity in cart
        $itemId = $this->request->getPost('item_id');
        $quantity = $this->request->getPost('quantity');
        
        $this->cartModel->updateItemQuantity($itemId, $quantity);
        return redirect()->to('/cart');
    }

    // public function checkout()
    // {
    //     // Handle checkout process
    //     return view('product_view');  // Adjust this view if necessary
    // }
}
