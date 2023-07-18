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

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/contacts', function() {
    (new ContactsController)->listsOfContacts();
});

$router->get('/contacts/details', function() {
    (new ContactsController)->showContactDetails();
});

$router->get('/companies', function() {
    (new CompaniesController)->listsOfCompagnies();
});

$router->get('/companies/details', function() {
    (new CompaniesController)->showCompanyDetails();
});

$router->get('/invoices', function() {
    (new InvoicesController)->listsOfInvoices();
});

$router->get('/invoices/details', function() {
    (new InvoicesController)->showInvoiceDetails();
});


/* DASHBOARD */

$router->get('/dashboard', function() {
    (new AdminsController)->index();
});

$router->all('/dashboard/treatment', function() {
    (new AdminsController)->treatment();
});

$router->get('/dashboard/invoices', function() {
    (new AdminsController)->newInvoice();
});

$router->get('/dashboard/companies', function() {
    (new AdminsController)->newCompany();
});

$router->get('/dashboard/contacts', function() {
    (new AdminsController)->newContact();
});

$router->get('/dashboard/update-invoice', function() {
    (new AdminsController)->updateInvoice();
});

$router->get('/dashboard/update-company', function() {
    (new AdminsController)->updateCompany();
});

$router->get('/dashboard/update-contact', function() {
    (new AdminsController)->updateContact();
});


$router->get('/fakers', function() {
    (new FakersController)->index();
});


/* 404 */

$router->set404(function() {
    (new HomeController)->error404();
});

$router->run();