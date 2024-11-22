<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    // Function to add product to the cart
    public function addToCart($productId, $quantity)
    {
        // Sample product data for demonstration
        $product = [
            'id' => $productId,
            'name' => 'Product ' . $productId,
            'price' => 1000 * $productId, // Just a random price
            'quantity' => $quantity
        ];

        // Get existing cart from session
        $cart = session()->get('cart') ?? [];

        // Check if product is already in the cart
        $found = false;
        foreach ($cart as $index => $item) {
            if ($item['id'] == $productId) {
                $cart[$index]['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        // If not found, add the product to cart
        if (!$found) {
            $cart[] = $product;
        }

        // Save updated cart back to session
        session()->set('cart', $cart);

        // Return cart count
        return json_encode(['cart_count' => count($cart)]);
    }

    // Function to get cart items
    public function getCart()
    {
        $cart = session()->get('cart') ?? [];
        return json_encode($cart);
    }
}
