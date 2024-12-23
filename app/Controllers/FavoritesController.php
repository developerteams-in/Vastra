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
    public function removeFavorite($productId)
    {
        $userId = session()->get('user')['id'];
        $favoritesModel = new FavoritesModel();
        $favoritesModel->removeFavorite($userId, $productId);

        return redirect()->to('/favorites');
    }
}
