<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        // Load the add product form
        return view('add_products');
    }
    

    public function Products()
    {
        $productModel = new ProductModel();

        // Fetch products grouped by categories
        $data = [
            'newarrivals' => $productModel->where('productCategory', 'NewArrivals')->findAll(),
            'kids' => $productModel->where('productCategory', 'KIDS')->findAll(),
            'ladies' => $productModel->where('productCategory', 'LADIES')->findAll(),
            'men' => $productModel->where('productCategory', 'MEN')->findAll(),
            'sport' => $productModel->where('productCategory', 'SPORTS')->findAll(),
        ];
     
        return view('/home', $data );
    }

    public function listProducts()
{
    $productModel = new ProductModel();

    // Fetch all products from the database
    $products = $productModel->findAll();

    // Pass products data to the view
    return view('product_list', ['products' => $products]);
}


    public function addProduct()
    {
        // Load validation service
        $validation = \Config\Services::validation();

        // Validate form inputs
        if (!$this->validate([
            'productName' => 'required|min_length[3]',
            'productDescription' => 'required|min_length[10]',
            'productPrice' => 'required|decimal',
            'productCategory' => 'required',
            'productImage' => 'uploaded[productImage]|is_image[productImage]|max_size[productImage,1024]|mime_in[productImage,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle image upload
        $file = $this->request->getFile('productImage');
if ($file->isValid() && !$file->hasMoved()) {
    $newName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads', $newName); // Save in public/uploads
} else {
    return redirect()->back()->withInput()->with('error', 'Image upload failed');
}

        // Prepare product data
        $productData = [
            'productName' => $this->request->getVar('productName'),
            'productDescription' => $this->request->getVar('productDescription'),
            'productPrice' => $this->request->getVar('productPrice'),
            'productCategory' => $this->request->getVar('productCategory'),
            'productImage' => $newName,
        ];

        // Save product to the database
        $productModel = new ProductModel();
        if ($productModel->insert($productData)) {
            return redirect()->to('/add_products')->with('message', 'Product added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add product');
        }
    }
    public function kids()
    {
        $productModel = new ProductModel();
        $kids = $productModel->where('productCategory', 'KIDS')->findAll(); // Fetch kids' products

        return view('/kids', ['kids' => $kids]); // Pass the kids data to the view
    }
}
