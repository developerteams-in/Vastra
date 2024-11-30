<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\showProduct_viewModel; // Ensure you include the correct model
use App\Models\ProductModel; // Ensure you include the correct model

class Product_view extends BaseController
{
    public function showProduct_view($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);
    
        if ($product) {
            $productData = [
                'id' => $product['id'], // Ensure the product ID is included
                'productName' => $product['productName'], 
                'productDescription' => $product['productDescription'],
                'productPrice' => $product['productPrice'],
                'productCategory' => $product['productCategory'],
                'productImage' => $product['productImage'], 
            ];
        } else {
            $productData = [
                'id' => 0, // Default or fallback ID
                'productName' => 'Unknown Product',
                'productDescription' => 'No description available.',
                'productPrice' => 0,
                'productCategory' => 'Unknown Category',
                'productImage' => 'default.jpg',
            ];
        }
    
        return view('product_view', ['product' => $productData]);
    }
    

    public function buyNow($Id)
    {
        // Get the product details from the database
        $productModel = new ProductModel();
        $product = $productModel->find($Id); // Use the correct variable

        if ($product) {
        
            return redirect()->to(site_url('checkout'));
        } else {
            // Handle the case where the product is not found
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function checkout()
    {
        // Handle the checkout logic here
        return view('checkout');
    }
}
