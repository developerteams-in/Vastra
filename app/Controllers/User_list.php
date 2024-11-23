<?php
namespace App\Controllers;

use App\Models\UserModel;

class User_list extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel(); // Initialize UserModel
    }

    public function showUser_list()
    {
        // Fetch users from the model
        $users = $this->userModel->findAll(); // Make sure this line is correct
        
        // Pass users data to the view
        return view('user_list', ['users' => $users]);
    }
}
