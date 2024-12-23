<?php
namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'productName', 'productDescription', 'productPrice', 'productCategory', 'productImage', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function addFavorite($userId, $productId, $productData)
    {
        $requiredKeys = ['productName', 'productDescription', 'productPrice', 'productCategory', 'productImage'];
        foreach ($requiredKeys as $key) {
            if (!isset($productData[$key])) {
                throw new \InvalidArgumentException("Missing required key: {$key}");
            }
        }

        $existingFavorite = $this->where('user_id', $userId)
                                 ->where('product_id', $productId)
                                 ->first();

        if ($existingFavorite) {
            return false;
        }

        $productData['productPrice'] = (float) $productData['productPrice'];

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
        return $this->select(['product_id', 'productName', 'productImage', 'productPrice'])
                    ->where('user_id', $userId)
                    ->findAll();
    }
}
