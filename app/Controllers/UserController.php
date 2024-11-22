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

        // Store the user data temporarily before OTP verification
        $userModel->save([
            'username' => $name,
            'email'    => $email,
            'password' => $password,
            'status'   => 'inactive', // User is inactive until OTP verification
        ]);

        // Store email in session for later use during OTP verification
        session()->set('email', $email);

        // Generate OTP (6-digit number)
        $otp = rand(100000, 999999);
        session()->set('otp', $otp);
        session()->set('otp_time', time()); // Store OTP creation time

        // Send OTP email
        $this->sendOTPEmail($email, $otp);

        // Redirect to OTP verification page
        return redirect()->to('/verify-otp')->with('message', 'OTP sent to your email!');
    }

    private function sendOTPEmail($email, $otp)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('your-email@example.com', 'Your Site Name');
        $emailService->setSubject('Your OTP for Registration');
        $emailService->setMessage("Your OTP for registration is: $otp");

        if (!$emailService->send()) {
            session()->setFlashdata('error', 'Failed to send OTP email.');
        }
    }

    public function verifyOTP()
    {
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $otp = $this->request->getPost('otp');
            $storedOtp = session()->get('otp');
            $otpTime = session()->get('otp_time');
            $currentTime = time();

            // Check if OTP is valid and not expired (5 minutes expiry)
            if ($otp == $storedOtp && ($currentTime - $otpTime) <= 300) {
                $userModel = new UserModel();

                // Get email from session and update status to active
                $email = session()->get('email');
                $userModel->where('email', $email)->set('status', 'active')->update();

                session()->remove('otp'); // Clear OTP from session
                session()->remove('email'); // Clear email from session
                session()->setFlashdata('success', 'OTP verified successfully!');
                return redirect()->to('/home'); // Redirect to home after successful OTP verification
            } else {
                session()->setFlashdata('error', 'Invalid or expired OTP.');
                return redirect()->to('/verify-otp');
            }
        }

        return view('verify_otp');
    }
}
