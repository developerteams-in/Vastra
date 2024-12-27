<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FooterController extends BaseController
{
    public function index()
    {

        return view('returns');
    }
    public function Shipping()
    {

        return view('shipping');
    }
    public function privacy()
    {

        return view('privacy-policy');
    }
    public function CustomerService(){
        return view('customer-service');
    }
    public function Careers(){
        return view('careers');
    }
    public function Magazine(){
        return view('magazine');
    }
    public function Beauty(){
        return view('beauty');
    }
    public function T_and_C(){
        return view('t_and_c');
    }
    public function FAQ(){
        return view('faq');
    }
}
