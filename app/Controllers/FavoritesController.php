<?php

namespace App\Controllers;

use App\Models\FavoritesModel;

class FavoritesController extends BaseController
{
    public function addToFavorites()
    {
        $favoritesModel = new FavoritesModel();
        $data = $this->request->getPost();

        // Validate input
        if (!isset($data['user_id']) || !isset($data['product_id'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid input data.']);
        }

        // Check if item already exists in favorites
        $exists = $favoritesModel->where('user_id', $data['user_id'])
                                 ->where('product_id', $data['product_id'])
                                 ->first();

        if ($exists) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Item already in favorites.']);
        }

        // Insert new favorite item
        $favoritesModel->insert([
            'user_id'    => $data['user_id'],
            'product_id' => $data['product_id'],
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Item added to favorites!']);
    }
}
