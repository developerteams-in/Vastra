<?php
namespace App\Controllers;

use App\Models\FavoriteModel;

class FavoriteController extends BaseController
{
    public function addFavorite()
    {
        $userId = session()->get('user')['id'];
        $productId = $this->request->getPost('product_id');

        if (!$userId) {
            return json_encode(['status' => 'not_logged_in']);
        }

        // Add logic to save the favorite in the database (e.g., insert query)

        return json_encode(['status' => 'added']);
    }

    public function removeFavorite()
    {
        $userId = session()->get('user')['id'];
        $productId = $this->request->getPost('product_id');

        if (!$userId) {
            return json_encode(['status' => 'not_logged_in']);
        }

        // Add logic to remove the favorite from the database (e.g., delete query)

        return json_encode(['status' => 'removed']);
    }

    // Define the 'viewFavorites' method to retrieve and display favorite products
    public function viewFavorites()
    {
        $userId = session()->get('user')['id'];
        if (!$userId) {
            return redirect()->to('/login');
        }

        // Fetch favorites from the database using the model
        $favoriteModel = new FavoriteModel();
        $favorites = $favoriteModel->getFavoritesByUser($userId);

        // Return the view and pass the favorites data
        return view('favorites', ['favorites' => $favorites]);
    }
}
