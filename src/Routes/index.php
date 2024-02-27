<?php

use App\Controllers\HomeController;
use App\Router;

require 'C:/xampp/htdocs/Tiny-URLS/src/Router.php';
require 'C:/xampp/htdocs/Tiny-URLS/src/Controllers/HomeController.php';


$router = new Router();

$router->get('/',HomeController::class,'index');

$router->dispatch();