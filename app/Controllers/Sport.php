<?php
namespace App\Controllers;

class Sport extends BaseController
{
    public function showSport()
    {
        // This will load the 'men.php' view file
        return view('sport');
    }
}
