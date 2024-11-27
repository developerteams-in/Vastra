<?php
namespace App\Controllers;

use App\Models\ProductModel;

class Sport extends BaseController
{
    public function showSport()
    {
            $productModel = new ProductModel();
            $sport = $productModel->where('productCategory', 'SPORTS')->findAll(); // Fetch kids' products
            return view('/sport', ['sport' => $sport]); // Pass the kids data to the view
        
    }
}
