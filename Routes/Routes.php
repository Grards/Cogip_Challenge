<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/contacts', function() {
    (new HomeController)->contacts();
});

$router->get('/companies', function() {
    (new HomeController)->companies();
});

$router->run();