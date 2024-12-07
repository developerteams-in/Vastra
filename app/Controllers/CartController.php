<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartModel;


class CartController extends Controller
{
    public function index()
    {
        $cartModel = new CartModel();
        $userId = session()->get('user')['id']; // Assuming user data is stored in session
        $cartItems = $cartModel->getCartByUser($userId);

        return view('cart', ['cart' => $cartItems]);
    }

    public function addtocart()
    {
        return view('cart');
    }

    public function add()
    {
        $cartModel = new CartModel();

        $productId = $this->request->getPost('product_id');
        $productQuantity = $this->request->getPost('product_quantity');
        $userId = session()->get('user')['id']; // Assuming user data is stored in session

        $data = [
            'product_id' => $productId,
            'quantity' => $productQuantity,
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $cartModel->addProductToCart($data);

        return $this->response->setJSON([
            'message' => 'Product added to cart successfully!',
        ]);
    }

    public function remove()
    {
        $cartModel = new CartModel();
        $index = $this->request->getPost('index'); // Assuming index corresponds to cart item ID

        if ($cartModel->delete($index)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
