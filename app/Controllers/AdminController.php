<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AdminController extends Controller
{
    public function __construct()
    {
        // Ensure the user is logged in and is an admin
        if (session()->get('user')['role'] !== 'admin') {
            return redirect()->to('/login')->with('error', 'You are not authorized to access the admin area.');
        }
    }

    public function dashboard()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users
        return view('admin/dashboard', $data); // Admin dashboard view
    }
}
