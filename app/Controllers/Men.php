<?php
namespace App\Controllers;

class Men extends BaseController
{
    public function showMen()
    {
        // This will load the 'men.php' view file
        return view('men');
    }
}
