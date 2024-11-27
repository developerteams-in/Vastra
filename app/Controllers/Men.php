<?php
namespace App\Controllers;

use App\Models\ProductModel;  // Import the ProductModel

class Men extends BaseController
{
    public function showMen()
    {
        // Instantiate the ProductModel
        $productModel = new ProductModel();

        // Fetch the men category products
        $men = $productModel->where('productCategory', 'MEN')->findAll();

        // Pass the data to the view
        return view('men', ['men' => $men]);
    }
}

