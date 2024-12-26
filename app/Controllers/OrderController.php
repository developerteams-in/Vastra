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

        return view('orders', ['orders' => $orders]); // Passing fetched orders to the view
    }

    // Handle the payment processing and order insertion
    public function processPayment()
    {
        // Get raw POST data from the request body
        $postData = $this->request->getJSON();
    
        // Extract individual fields
        $paymentMethod = $postData->payment_method;
        $userId = $postData->user_id;
        $totalPrice = $postData->total_price;
        $productNames = $postData->product_names;
    
        // Insert the order record into the database
        $orderModel = new OrderModel();
        $orderData = [
            'user_id' => $userId,
            'productName' => implode(', ', $productNames), // Combine product names into a single string
            'order_date' => date('Y-m-d H:i:s'),
            'total_price' => $totalPrice,
            'status' => 'completed', // Default status for the order
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    
        // Insert the order
        $orderModel->insert($orderData);
    
        // Send a response back to the frontend
        return $this->response->setJSON(['status' => 'success']);
    }

    // Handle order cancellation
    public function cancelOrder($orderId)
    {
        $orderModel = new OrderModel();

        // Find the order by ID and verify if it belongs to the logged-in user
        $order = $orderModel->where('id', $orderId)
                            ->where('user_id', session()->get('user')['id'])
                            ->first();

        if ($order) {
            // Update the order status to 'canceled'
            $orderModel->update($orderId, ['status' => 'canceled', 'updated_at' => date('Y-m-d H:i:s')]);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Order canceled successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Order not found or unauthorized']);
        }
    }
}