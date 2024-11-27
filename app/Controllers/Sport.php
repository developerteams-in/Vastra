<?php
namespace App\Controllers;

use App\Models\ProductModel;

class Sport extends BaseController
{
    public function showSport()
    {
            $productModel = new ProductModel();
            $sport = $productModel->where('productCategory', 'sport')->findAll(); // Fetch sport' products
            return view('/sport', ['sport' => $sport]); // Pass the sport data to the view
        
    }
}
