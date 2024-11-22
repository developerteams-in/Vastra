<?php
namespace App\Controllers;

class Ladies extends BaseController
{
    public function showLadies()
    {
        // This will load the 'ladies.php' view file
        return view('ladies');
    }
}
