<?php
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'quantity',
        'user_id',
        'product_name',
        'product_size',
        'product_price',
        'product_image',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;

    // Get all cart items for a user without JOIN
    public function getCartByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    // Add a new product to the cart
    public function addProductToCart($productData)
    {
        try {
            $existingItem = $this->where([
                'product_id' => $productData['product_id'],
                'user_id' => $productData['user_id'],
                'product_size' => $productData['product_size']
            ])->first();

            if ($existingItem) {
                $newQuantity = $existingItem['quantity'] + $productData['quantity'];
                $this->update($existingItem['id'], ['quantity' => $newQuantity]);
                return ['status' => true, 'message' => 'Quantity updated'];
            }

            $this->insert($productData);
            return ['status' => true, 'message' => 'Product added'];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function updateProductQuantity($cartId, $quantity)
    {
        $this->update($cartId, ['quantity' => $quantity]);
    }

    public function getCartCount($userId)
    {
        return $this->where('user_id', $userId)->countAllResults();
    }
}
