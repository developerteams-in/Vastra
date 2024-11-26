<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session(); // Initialize session service
    }

    public function logout()
    {
        session()->destroy(); // Destroy the session
        return redirect()->to('/login'); // Redirect to login page
    }

    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        // Initialize the ProductModel
        $productModel = new ProductModel();

        // Fetch all products from the database
        $products = $productModel->findAll();

        // Pass the products data to the view (home.php)
        return view('/home', ['products' => $products]);
    }
    public function admin()
    {
        // This is where you can define the admin view
        return view('admin');
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmit()
    {
        $userModel = new UserModel();

        $rules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        $userModel->save([
            'username' => $name,
            'email'    => $email,
            'password' => $password,
            'role'     => 'user' // Default role for new users
        ]);

        return redirect()->to('/register')->with('message', 'Registration successful!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmit()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            // Set session data for the user
            session()->set('user', $user);
    
            // Check if the user is an admin and redirect accordingly
            if ($user['role'] === 'admin') {
                return redirect()->to('/dashboard'); // Admin dashboard
            } else {
                return redirect()->to('/'); // Regular user dashboard
            }
        } else {
            // Redirect back to the login page with an error message
            return redirect()->to('/login')->with('error', 'Invalid email or password');
        }
    }

    public function dashboard()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users
        return view('dashboard', $data); // Pass the data to the view
    }
}
