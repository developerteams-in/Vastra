<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartModel;

class CartController extends Controller
{
    public function index()
    {
        $cartModel = new CartModel();
        $userId = session()->get('user')['id'];

        if (!$userId) {
            return redirect()->to('/login');
        }

        $cartItems = $cartModel->getCartByUser($userId);

        return view('cart', ['cart' => $cartItems]);
    }

    public function add()
    {
        // Check if user is logged in
        $user = session()->get('user');
        if (!$user) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Please log in to add items to the cart.'
            ]);
        }

        // Validate and process data
        $productId = $this->request->getPost('product_id');
        $productName= $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productImage = $this->request->getPost('product_image');
        $productSize = $this->request->getPost('product_size');
        $productQuantity = $this->request->getPost('product_quantity');
        $userId = $user['id']; // Assuming `user_id` is stored in the session

        if (!$productId || !$productPrice || !$productSize || !$productQuantity) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid data provided.'
            ]);
        }

        // Insert into database
        $cartModel = new CartModel();

        $cartData = [
            'product_id' => $productId,
            'product_name'=>$productName,
            'product_price' => $productPrice,
            'product_image' => $productImage,
            'product_size' => $productSize,
            'quantity' => $productQuantity,
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($cartModel->save($cartData)) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Item added to cart successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Something went wrong while saving the data.'
            ]);
        }
    }
    public function remove()
    {
        $session = session();
        $cartIdToRemove = $this->request->getPost('cart_id');

        if ($cartIdToRemove) {
            $cartModel = new CartModel();
            $cartModel->delete($cartIdToRemove);

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Item removed successfully.',
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Failed to remove item.',
        ]);
    }
     // Fetch cart count dynamically
    // CartController.php
public function getCartCount()
{
    $userId = session()->get('user')['id']; // Get the user ID from the session
    $cartModel = new \App\Models\CartModel();
    $cartCount = $cartModel->where('user_id', $userId)->countAllResults();
    
    return $this->response->setJSON(['cartCount' => $cartCount]);
}
public function clearCart()
{
    $userId = session()->get('user')['id'];
    
    if ($userId) {
        // Assuming you have a CartModel with a method to clear cart items by user ID
        $cartModel = new CartModel();
        $success = $cartModel->clearCartByUserId($userId);

        if ($success) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to clear cart']);
        }
    } else {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid user ID']);
    }
}


}

