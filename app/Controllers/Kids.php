<?php
namespace App\Controllers;

class Kids extends BaseController
{
    public function showKids()
    {
        // This will load the 'men.php' view file
        return view('kids');
    }
}
