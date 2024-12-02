<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart_items';  // Updated to 'cart_items'
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'quantity', 'user_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Get all cart items for a user
    public function getCartByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    // Add a new product to the cart
    public function addProductToCart($productData)
    {
        $this->insert($productData);
    }

    // Update the quantity of an existing product in the cart
    public function updateProductQuantity($cartId, $quantity)
    {
        $this->update($cartId, ['quantity' => $quantity]);
    }

    // Get the count of items in the cart
    public function getCartCount($userId)
    {
        return $this->where('user_id', $userId)->countAllResults();
    }
}
