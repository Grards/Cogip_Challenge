<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\ContactsController;
use App\Controllers\CompaniesController;
use App\Controllers\InvoicesController;
use App\Controllers\FakersController;
use App\Controllers\AdminsController;

define('BASE_URL', "/Cogip_Challenge/public/"); 
define('IMG', "/Cogip_Challenge/public/assets/img/"); 
define('VIEWS', __ROOT__."/Resources/views/"); 
define('ERROR_PAGE', "<p class='error_page'>This page doesn't exist</p>");

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/contacts', function() {
    (new ContactsController)->listsOfContacts();
});

$router->get('/companies', function() {
    (new CompaniesController)->listsOfCompagnies();
});

$router->get('/invoices', function() {
    (new InvoicesController)->listsOfInvoices();
});

$router->get('/invoices/details/', function($id) {
    (new InvoicesController)->showInvoiceDetails($id);
});


/* DASHBOARD */

$router->get('/dashboard', function() {
    (new AdminsController)->index();
});

$router->get('/dashboard/treatment', function() {
    (new AdminsController)->treatment();
});

$router->get('/dashboard/new-invoice', function() {
    (new AdminsController)->newInvoice();
});

$router->get('/dashboard/new-company', function() {
    (new AdminsController)->newCompany();
});

$router->get('/dashboard/new-contact', function() {
    (new AdminsController)->newContact();
});

$router->get('/fakers', function() {
    (new FakersController)->index();
});


/* 404 */

$router->set404(function() {
    (new HomeController)->error404();
});

$router->run();