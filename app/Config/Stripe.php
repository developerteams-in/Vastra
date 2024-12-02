<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Stripe extends BaseConfig
{
    public $publishableKey = 'pk_test_51QQqGfBzLGJS8rXqyqJhc8A3ouXn9uVcPmBgP7eafH6cyfCdT1kSAxxsmls7QuMkcKaHACTG9EygarUevx99sXYn00oJLAhiA7'; // Replace with your Stripe Publishable Key
    public $secretKey = 'sk_test_51QQqGfBzLGJS8rXq5MbCUjxzyejNc1aFyAFNh8vrMZdyVkQMk9xg2eeXRvD8E47XmuPNU6YgB6dMYarTIi1h6qDI00GQsR4bXn'; // Replace with your Stripe Secret Key
}
