<?php
namespace App\Controllers;

use Stripe\Stripe as StripeAPI;
use Stripe\PaymentIntent;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Config\Stripe; // Ensure the correct namespace

class CheckoutController extends BaseController
{
    public function index()
    {
        $cartModel = new CartModel();
        $userId = session()->get('user')['id']; // User ID from session

        // Fetch user cart items
        $cart_items = $cartModel->getCartByUser($userId);

        // Load the Stripe configuration
        $stripeConfig = new Stripe();
        $publishableKey = $stripeConfig->publishableKey; 

        // Retrieve session user details
        $user = session()->get('user');

        // Load the checkout view with data
        return view('checkout', [
            'cart_items' => $cart_items,
            'publishableKey' => $publishableKey,
            'user' => $user,
        ]);
    }

    public function processPayment()
    {
        $stripeConfig = new Stripe();
        StripeAPI::setApiKey($stripeConfig->secretKey);

        $cartModel = new CartModel();
        $userId = session()->get('user')['id'];

        // Fetch user cart data
        $cartItems = $cartModel->getCartByUser($userId);

        // Check if the cart is empty
        if (empty($cartItems)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Your cart is empty.',
            ]);
        }

        // Calculate total amount
        $totalAmount = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['product_price'] * $item['quantity']);
        }, 0);

        // Stripe requires the amount in cents
        $totalAmountInCents = $totalAmount * 100;

        try {
            // Create a payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmountInCents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);

            // Return client secret for frontend
            return $this->response->setJSON([
                'status' => 'success',
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Payment processing failed: ' . $e->getMessage(),
            ]);
        }
    }
}
