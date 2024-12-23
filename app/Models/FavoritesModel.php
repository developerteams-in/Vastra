<?php
namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'productName', 'productDescription', 'productPrice', 'productCategory', 'productImage', 'created_at', 'updated_at'];

    public function addFavorite($userId, $productId, $productData)
    {
        $existingFavorite = $this->where('user_id', $userId)
                                 ->where('product_id', $productId)
                                 ->first();

        if ($existingFavorite) {
            return false;
        }

        return $this->insert(array_merge(['user_id' => $userId, 'product_id' => $productId], $productData));
    }

    public function removeFavorite($userId, $productId)
    {
        return $this->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->delete();
    }

    public function getFavoritesByUser($userId)
    {
        return $this->db->table('favorites')
                        ->where('user_id', $userId)
                        ->get()->getResultArray();
    }
}
