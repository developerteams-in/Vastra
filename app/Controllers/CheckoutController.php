<?php
namespace App\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\ProductModel;
use App\Models\CartModel;

class CheckoutController extends BaseController
{
    // public function index()
    // {
    //     // Example: Fetch the product details based on a product ID
    //     $productId = 1; // You can replace this with dynamic data, like from the URL or session
    //     $productModel = new ProductModel();
        
    //     // Get the product data by ID
    //     $product = $productModel->find($productId); 
        
    //     // Get the Stripe public key (you might need to fetch this from the settings)
    //     $publishableKey = 'your_stripe_publishable_key';
    
    //     // Get the user info from session (if any)
    //     $user = session()->get('user');
        
    //     // Pass data to the view
    //     return view('checkout', [
    //         'product' => $product,
    //         'publishableKey' => $publishableKey,
    //         'user' => $user,
    //     ]);
    // }
    
    public function index()
    {
        // Fetch cart items for the user based on user_id
        $cartModel = new CartModel();
        $userId = session()->get('user')['id'];  // Fetching user ID from the session
        $cart_items = $cartModel->getCartByUser($userId);  // Getting cart items for the specific user
    
        // Fetch all available products
        $productModel = new ProductModel();
        $products = $productModel->findAll();  // Get all products (if needed based on cart data, modify this)
    
        // Set the publishable key for Stripe
        $publishableKey = 'your_stripe_publishable_key';  // Replace with your actual publishable key
    
        // Retrieve user info from session
        $user = session()->get('user');
    
        // Pass the necessary data to the checkout view
        return view('checkout', [
            'products' => $products,  // All products data
            'cart_items' => $cart_items,  // Cart items for the user
            'publishableKey' => $publishableKey,  // Stripe key for payment
            'user' => $user,  // User session data
        ]);
    }
    

    public function showCheckout($productId)
    {
        // Set Stripe configuration
        $stripeConfig = new \App\Config\Stripe();
        
        // Initialize data to pass to the view
        $data = [
            'title' => 'Checkout',
            'publishableKey' => $stripeConfig->publishableKey
        ];

        // Load the ProductModel
        $productModel = new ProductModel();
        
        // Fetch the product based on productId
        $product = $productModel->find($productId);
        
        // Check if the product exists, and if not, redirect
        if (!$product) {
            return redirect()->to('/products')->with('error', 'Product not found.');
        }

        // Store product information into the data array
        $data['product'] = $product; // this will be passed to the view

        // Return the checkout view with the product data
        return view('checkout', $data);
    }

    public function processPayment($productId)
    {
        // Set Stripe configuration
        $stripeConfig = new \App\Config\Stripe();
        Stripe::setApiKey($stripeConfig->secretKey);

        // Fetch the product again to get its price
        $productModel = new ProductModel();
        $product = $productModel->find($productId);
        
        // Check if product exists
        if (!$product) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Product not found.'
            ]);
        }

        try {
            // Set payment amount (Stripe expects amount in cents)
            $amount = $product['productPrice'] * 100; // Multiply by 100 to convert to cents
            
            // Create a payment intent (for processing payment)
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);
            
            // Return the response with client secret for Stripe client
            return $this->response->setJSON([
                'status' => 'success',
                'clientSecret' => $paymentIntent->client_secret,
                'product' => [
                    'name' => $product['productName'],
                    'price' => $product['productPrice'],
                ],
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Payment processing failed: ' . $e->getMessage(),
            ]);
        }
    }
}
