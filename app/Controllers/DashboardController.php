<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    protected $orderModel;
    protected $productModel;
    protected $userModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
    }

    public function dashboard()
    {
        // Fetching total orders count
        $totalOrders = $this->orderModel->countAll();
        $pendingOrders = $this->orderModel->where('status', 'pending')->countAllResults();
        $completedOrders = $this->orderModel->where('status', 'completed')->countAllResults();
        $totalSales = $this->orderModel->selectSum('total_price')->first()['total_price'] ?? 0;
        $totalProducts = $this->productModel->countAll();
        $orders = $this->orderModel->findAll();

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'pendingOrders' => $pendingOrders,
            'completedOrders' => $completedOrders,
            'totalSales' => $totalSales,
            'totalProducts' => $totalProducts,
            'orders' => $orders,
        ]);
    }

    public function updateOrderStatus()
    {
        // Retrieve JSON data from the request body
        $json = $this->request->getJSON();
        $orderId = $json->id ?? null;
        $status = $json->status ?? null;
    
        // Validate input
        if (!$orderId || !$status) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data provided']);
        }
    
        // Update the status in the database
        $updated = $this->orderModel->update($orderId, [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    
        if ($updated) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Order status updated successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update order status']);
        }
    }
    
}
