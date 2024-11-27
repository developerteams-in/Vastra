<?php
namespace App\Controllers;

use App\Models\ProductModel;  // Import the ProductModel

class Ladies extends BaseController
{
    public function showLadies()
    {
        // Instantiate the ProductModel
        $productModel = new ProductModel();

        // Fetch the men category products
        $ladies = $productModel->where('productCategory', 'LADIES')->findAll();

        // Pass the data to the view
        return view('ladies', ['ladies' => $ladies]);
    }
}


