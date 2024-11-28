<?php

// app/Controllers/DashboardController.php
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
// print_r($totalOrders);
// exit();
    // Fetching pending orders count
    $pendingOrders = $this->orderModel->where('status', 'pending')->countAllResults();
    $completedOders = $this->orderModel->where('status', 'completed')->countAllResults();

    // Fetching total sales (sum of total_price in orders)
    $totalSales = $this->orderModel->selectSum('total_price')->first();
    $totalSales = $totalSales ? $totalSales['total_price'] : 0;

    // Fetching total products count
    $totalProducts = $this->productModel->countAll();

    // Example data for price chart
    $dateLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];
    $priceData = [150, 200, 250, 300, 350];
    // Fetching all users data
    $users = $this->userModel->findAll(); 


    return view('dashboard', [
        'totalOrders' => $totalOrders,
        'pendingOrders' => $pendingOrders,
        'completedOders' => $completedOders,  
        'totalSales' => $totalSales,
        'totalProducts' => $totalProducts,
        'dateLabels' => $dateLabels,
        'priceData' => $priceData,
        'users' => $users,
    ]);
}

}
