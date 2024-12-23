<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id'];

    // Method to add a product to favorites
    public function addFavorite($userId, $productId)
    {
        return $this->insert([
            'user_id' => $userId,
            'product_id' => $productId
        ]);
    }

    // Method to remove a product from favorites
    public function removeFavorite($userId, $productId)
    {
        return $this->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->delete();
    }

    // Method to get the user's favorite products (move this here)
    public function getFavoritesByUser($userId)
    {
        return $this->db->table('favorites')
            ->join('products', 'favorites.product_id = products.id')
            ->where('favorites.user_id', $userId)
            ->get()->getResultArray();
    }
}
