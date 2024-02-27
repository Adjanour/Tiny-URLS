<?php

namespace App\Controllers;

use App\Controller;
require '/xampp/htdocs/Tiny-URLS/src/Controller.php';

class HomeController extends Controller
{
    public function index(){
        $this->render('index');
    }
}