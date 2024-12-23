<?php
namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'productName', 'productDescription', 'productPrice', 'productCategory', 'productImage', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    /**
     * Add a product to the user's favorites.
     */
    public function addToFavorites($userId, $productId)
    {
        return $this->insert([
            'user_id' => $userId,
            'product_id' => $productId
        ]);
    }
    public function addFavorite($userId, $productId, $productData)
    {
        // Ensure all required keys are present
        $requiredKeys = ['productName', 'productDescription', 'productPrice', 'productCategory', 'productImage'];
        foreach ($requiredKeys as $key) {
            if (!isset($productData[$key])) {
                throw new \InvalidArgumentException("Missing required key: {$key}");
            }
        }

        // Log incoming data for debugging
        log_message('debug', 'Adding favorite: userId = ' . $userId . ', productId = ' . $productId);

        // Check if the product is already in the favorites for this user
        $existingFavorite = $this->where('user_id', $userId)
                                 ->where('product_id', $productId)
                                 ->first();

        // Log the result of the existing favorite check
        log_message('debug', 'Existing favorite check: ' . print_r($existingFavorite, true));

        if ($existingFavorite) {
            return false; // Product is already in favorites
        }

        // Ensure productPrice is correctly set as a float
        $productData['productPrice'] = (float) $productData['productPrice'];

        // Insert the new favorite into the database
        return $this->insert(array_merge(['user_id' => $userId, 'product_id' => $productId], $productData));
    }

    /**
     * Remove a product from the user's favorites.
     */
  
        // Get all favorite product IDs for a specific user
        public function getFavoritesByUser($userId)
        {
            return $this->where('user_id', $userId)->findAll();  // Fetch all rows for this user
        }
    
        // Add a product to the user's favorites
    
    
        // Remove a product from the user's favorites
        public function removeFromFavorites($userId, $productId)
        {
            return $this->where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->delete();  // Delete the specific product from favorites
        }
        
    }
    

