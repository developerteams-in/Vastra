<?php
namespace App\Controllers;

class FavoritesController extends BaseController
{
    public function viewFavorites()
    {
        return view('favorites'); // Load the favorites view
    }

    public function addToFavorites()
    {
        // Logic for adding a favorite (already implemented)
    }
}
