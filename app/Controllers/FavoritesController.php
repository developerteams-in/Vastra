<?php

namespace App\Controllers;

use App\Models\FavoritesModel;

class FavoritesController extends BaseController
{
    public function showFavorites()
    {
        $favoritesModel = new FavoritesModel();
        
        // Get favorites for the logged-in user
        $userId = session()->get('user')['id']; 
        $favorites = $favoritesModel->getFavoritesByUser($userId);

        return view('favorites', ['favorites' => $favorites]);
    }

    public function add_to_favorites()
    {
        // Check if the user is logged in or has a session
        $user_id = session()->get('user')['id']; // Or get user_id from session
        if (!$user_id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not logged in']);
        }
    
        // Get product data from the request
        $product_id = $this->request->getPost('product_id');
        $product_name = $this->request->getPost('product_name');
        $product_description = $this->request->getPost('product_description');
        $product_price = $this->request->getPost('product_price');
        $product_category = $this->request->getPost('product_category');
        $product_image = $this->request->getPost('product_image');
    
        // Prepare data to insert into the favorites table
        $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'productName' => $product_name,
            'productDescription' => $product_description,
            'productPrice' => $product_price,
            'productCategory' => $product_category,
            'productImage' => $product_image,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    
        // Insert data into the favorites table
        $favoriteModel = new \App\Models\FavoritesModel(); // Adjust model name
        $favoriteModel->save($data);
    
        return $this->response->setJSON(['status' => 'success']);
    }
        public function removeFavorite($productId)
    {
        $userId = session()->get('user')['id']; 
        $favoritesModel = new FavoritesModel();
        $favoritesModel->removeFavorite($userId, $productId);

        return redirect()->to('/favorites');
    }
}
