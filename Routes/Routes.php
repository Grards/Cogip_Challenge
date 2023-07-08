<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\ContactsController;

define('BASE_URL', "/Cogip_Challenge/public/"); 
define('ERROR_PAGE', "<p class='error_page'>This page doesn't exist</p>");

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/contacts', function() {
    (new ContactsController)->allContacts();
});

$router->set404(function() {
    (new HomeController)->error404();
});



// $router->get('/companies', function() {
//     (new HomeController)->companies();
// });

$router->run();