<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;
use App\Models\Contact;
use App\Models\Company;

class HomeController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
        // Création des instances des modèles
        $invoiceModel = new Invoice();
        $contactModel = new Contact();
        $companyModel = new Company();

        // Récupérer les 5 derniers enregistrements de la table 'invoices'
        $invoices = $invoiceModel->getLatestInvoices(5);

        // Récupérer les 5 derniers enregistrements de la table 'contacts'
        $contacts = $contactModel->getLatestContacts(5);

        // Récupérer les 5 derniers enregistrements de la table 'companies'
        $companies = $companyModel->getLatestCompanies(5);


        return $this->view('welcome', [
            "name" => "Cogip",
            "invoices" => $invoices,
            "contacts" => $contacts,
            "companies" => $companies
        ]);
    }

    public function error404()
    {
        return $this->view('404');
    }

    public function searchRequest()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            if ($page === 'contacts') {
                $contactController = new ContactsController();
                $contactController->show();
            } else if ($page === 'companies') {
                return $this->view('companies');
            } else if ($page === 'invoices') {

                return $this->view('invoices');
            } else {
                return $this->view('404');
            }
        } else {
            return $this->view('welcome');
        }
    }
}
