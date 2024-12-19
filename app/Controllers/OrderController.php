<?php

namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\Controller;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;

class OrderController extends Controller
{
    // Display all orders for the logged-in user
    public function index()
    {
        // Fetching orders for logged-in user
        $orderModel = new OrderModel();
        $orders = $orderModel->where('user_id', session()->get('user')['id'])->findAll();

        return view('orders', ['orders' => $orders]);  // Passing fetched orders to the view
    }

    // Handle payment processing
    public function processPayment()
    {
        helper(['form', 'url']);
        $stripeSecretKey = 'your_stripe_secret_key';
        Stripe::setApiKey($stripeSecretKey);

        $request = service('request');
        $ordersModel = new OrdersModel();

        $paymentMethodId = $request->getPost('paymentMethodId');
        $userId = $request->getPost('userId');
        $productName = $request->getPost('productName') ?? 'Order';
        $orderData = $request->getPost('orderData');
        $totalPrice = $request->getPost('amount');

        if (!$paymentMethodId || !$userId || !$totalPrice) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid data']);
        }

        try {
            // Create a Payment Intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalPrice * 100, // Amount in paise (smallest currency unit)
                'currency' => 'inr',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            if ($paymentIntent->status === 'succeeded') {
                // Save order to database
                $order = [
                    'user_id' => $userId,
                    'productName' => $productName,
                    'order_data' => json_encode($orderData),
                    'total_price' => $totalPrice,
                    'status' => 'Completed',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $ordersModel->insert($order);

                return $this->response->setJSON(['success' => true, 'message' => 'Payment successful']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Payment not confirmed']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
