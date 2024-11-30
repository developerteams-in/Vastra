<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart'; // Use session or table for cart items
    protected $allowedFields = ['product_id', 'quantity', 'user_id'];

    public function getCartItems()
    {
        // Get cart items from database or session
        // For simplicity, assuming data is stored in session
        return session()->get('cart') ?? [];
    }

    public function addToCart($productId, $quantity)
    {
        // Add product to cart
        $cart = session()->get('cart') ?? [];
        $cart[] = ['product_id' => $productId, 'quantity' => $quantity];
        session()->set('cart', $cart);
    }

    public function removeFromCart($productId)
    {
        // Remove product from cart
        $cart = session()->get('cart');
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId) {
                unset($cart[$key]);
                break;
            }
        }
        session()->set('cart', $cart);
    }

    public function updateItemQuantity($productId, $quantity)
    {
        // Update quantity of an item in the cart
        $cart = session()->get('cart');
        foreach ($cart as &$item) {
            if ($item['product_id'] == $productId) {
                $item['quantity'] = $quantity;
                break;
            }
        }
        session()->set('cart', $cart);
    }
}
