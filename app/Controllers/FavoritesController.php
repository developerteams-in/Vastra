<?php

namespace App\Controllers;

use App\Models\FavoritesModel;

class FavoritesController extends BaseController
{
    // Method to show user's favorite products
    public function showFavorites()
    {
        $favoritesModel = new FavoritesModel();
        
        // Get favorites for the logged-in user
        $userId = session()->get('user')['id']; 
        $favorites = $favoritesModel->getFavoritesByUser($userId);

        return view('favorites', ['favorites' => $favorites]);
    }

    // Method to add a product to favorites
    public function add_to_favorites()
{
    $userId = session()->get('user')['id'];
    if (!$userId) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'User not logged in']);
    }

    $productId = $this->request->getPost('product_id');
    $productData = [
        'productName' => $this->request->getPost('product_name'),
        'productDescription' => $this->request->getPost('product_description'),
        'productPrice' => $this->request->getPost('product_price'),
        'productCategory' => $this->request->getPost('product_category'),
        'productImage' => $this->request->getPost('product_image')
    ];

   
    $favoriteModel = new FavoritesModel();

    if ($this->request->getPost('action') === 'add') {
        $isAdded = $favoriteModel->addFavorite($userId, $productId, $productData);
        if (!$isAdded) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'Product is already in favorites']);
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'Product added to favorites']);
    } else {
        $isRemoved = $favoriteModel->removeFavorite($userId, $productId);
        if (!$isRemoved) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'Failed to remove product from favorites']);
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'Product removed from favorites']);
    }
}
    // Method to remove a product from favorites
            public function getUserFavorites()
        {
            $favoritesModel = new FavoritesModel();
            $userId = session()->get('user')['id'];  // Assuming user ID is stored in session
    
            // Fetch user's favorite products from the database
            $favorites = $favoritesModel->getFavoritesByUser($userId);
    
            // Return the response as JSON
            return $this->response->setJSON([
                'status' => 'success',
                'favorites' => array_column($favorites, 'product_id') // Just return product IDs
            ]);
        }
    
        // Method to add or remove product from favorites
        public function addToFavorites()
        {
            $productId = $this->request->getPost('product_id');
            $action = $this->request->getPost('action');
            $userId = session()->get('user')['id']; // Assuming user ID is stored in session
    
            $favoritesModel = new FavoritesModel();
            $productData = [
                'productName' => $this->request->getPost('product_name'),
                'productDescription' => $this->request->getPost('product_description'),
                'productPrice' => $this->request->getPost('product_price'),
                'productCategory' => $this->request->getPost('product_category'),
                'productImage' => $this->request->getPost('product_image')
            ];
    
            if ($action == 'add') {
                // Add the product to the user's favorites  
                $favoritesModel->addFavorite($userId, $productId,$productData);
            } else {
                // Remove the product from the user's favorites
                $favoritesModel->removeFromFavorites($userId, $productId);
            }
    
            return $this->response->setJSON(['status' => 'success']);
        }
        public function removeFavorite($productId)
        {
            $favoritesModel = new FavoritesModel();
            $userId = session()->get('user')['id'];  // Assuming user ID is stored in session
    
            // Remove the product from the user's favorites
            $favoritesModel->removeFromFavorites($userId, $productId);
    
            // Optionally, you can flash a success message and redirect
            session()->setFlashdata('success', 'Product removed from favorites');
    
            // Redirect to the favorites page or wherever appropriate
            return redirect()->to('/favorites');
        }
    }
    
    
