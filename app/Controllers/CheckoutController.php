<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Home; // Import OrderModel
use App\Models\ProductModel; // Import ProductModel

class CheckoutController extends BaseController
{
    
    // Show the checkout page with dynamic product data
    public function Showcheckout($productId)
{
    $stripeConfig = new \App\Config\Stripe(); // Stripe config with keys
    $data = [
        'title' => 'Checkout',
        'publishableKey' => $stripeConfig->publishableKey
    ];

    // Initialize ProductModel
    $productModel = new \App\Models\ProductModel();

    // Fetch the product details from the database by ID
    $product = $productModel->find($productId); // Find product by ID

    // Check if the product exists
    if (!$product) {
        // Handle case where the product is not found
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
    }

    // Pass the product data to the view
    $data['product'] = $product;

    // Return the checkout page with product details
    return view('checkout', $data);
}

    // Process the payment via Stripe
    public function processPayment($productId)
    {
        $stripeConfig = new \App\Config\Stripe(); // Use the config class for keys

        // Set the Stripe secret key
        Stripe::setApiKey($stripeConfig->secretKey);

        try {
            // Create a PaymentIntent (payment processing)
            $paymentIntent = PaymentIntent::create([
                'amount' => 5000,  // Amount in cents ($50.00)
                'currency' => 'usd',
                'payment_method_types' => ['card'], // Allowed payment methods
            ]);

            // Prepare the response with the client secret
            $response = [
                'status' => 'success',
                'message' => 'Payment Intent created successfully',
                'clientSecret' => $paymentIntent->client_secret, // Send this to frontend
            ];
        } catch (\Exception $e) {
            // Handle payment processing error
            $response = [
                'status' => 'error',
                'message' => 'Payment processing failed: ' . $e->getMessage(),
            ];
        }

        // Return JSON response
        return $this->response->setJSON($response);
    }
}
