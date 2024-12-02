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

    // Add product to the cart
    public function addToCart()
    {
        $session = session();
        $userId = $session->get('user_id'); // Assume user_id is stored in session

        // Get POST data
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        // Validate product ID and quantity
        if (!$productId || $quantity <= 0) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid product or quantity']);
        }

        // Check if the product is already in the cart
        $existingCart = $this->cartModel->where('product_id', $productId)
                                        ->where('user_id', $userId)
                                        ->first();

        // If product exists, update the quantity
        if ($existingCart) {
            $newQuantity = $existingCart['quantity'] + $quantity;
            $this->cartModel->updateProductQuantity($existingCart['id'], $newQuantity);
        } else {
            // If product doesn't exist in cart, add a new entry
            $cartData = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'user_id' => $userId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->cartModel->addProductToCart($cartData);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Product added to cart']);
    }

    // Get cart item count for the user
    public function cartCount()
    {
        $session = session();
        $userId = $session->get('user_id'); // Get user ID from session
        $cartCount = $this->cartModel->getCartCount($userId);

        return $this->response->setJSON(['cart_count' => $cartCount]);
    }
}
