<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('dashboard', $data); // Show the user list on the dashboard
    }

    public function create()
    {
        return view('register'); // Render the registration page
    }

    public function store()
    {
        $userModel = new UserModel();

        // Validation rules
        $rules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        // Validate input
        if (!$this->validate($rules)) {
            return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get user input
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        // Store the user data
        $userModel->save([
            'username' => $name,
            'email'    => $email,
            'password' => $password,
            'status'   => 'active', // User is now active
        ]);

        session()->setFlashdata('success', 'Registration successful!');
        return redirect()->to('/home'); // Redirect to home after registration
    }
    public function edit_user($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User not found");
        }

        return view('/edit_user', ['user' => $user]);
    }
    
}

    

