<?php
use App\Models\CartModel;

class CartController extends \CodeIgniter\Controller
{
    public function index()
    {
        $cartModel = new CartModel();
        $items = $cartModel->findAll(); // Fetch all cart items

        return view('cart/index', ['items' => $items]);
    }

    public function add()
    {
        $cartModel = new CartModel();
        $cartModel->insert([
            'productName'        => 'Sample Product',
            'productDescription' => 'Description here',
            'productPrice'       => 100.00,
            'productCategory'    => 'Category',
            'productImage'       => 'image.jpg',
        ]);

        return redirect()->to('/cart');
    }
}
