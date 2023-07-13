<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
use App\Models\Invoice;
use App\Models\Contact;
use App\Models\Company;

class AdminsController extends Controller
{
    public function index(){

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

        $searchQuery = "";
        $statsCompanies = $companyModel->getCountOfCompanies($searchQuery);
        $statsContacts = $contactModel->getCountOfContacts($searchQuery);
        $statsInvoices = $invoiceModel->getCountOfInvoices($searchQuery);


        $adminModel = new Admin();
        $user = $adminModel->getUser();

        return $this->viewAdmin('dashboard',[
            "invoices" => $invoices,
            "contacts" => $contacts,
            "companies" => $companies,
            "statsCompanies" => $statsCompanies[0],
            "statsContacts" => $statsContacts[0],
            "statsInvoices" => $statsInvoices[0],
            "user" => $user[0]
        ]);
    }

    public function treatment(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['new-contact'])){
                $contact_name = htmlspecialchars($_POST['new-contact__name']);
                $contact_company = htmlspecialchars($_POST['new-contact__company']);
                $contact_email = htmlspecialchars($_POST['new-contact__email']);
                $contact_phone = htmlspecialchars($_POST['new-contact__phone']);
                $contact_created_at = date("Y/m/d hh:mm:ss");

                if(isset($_POST['new-contact__picture'])){
                    // Picture treatment
                }

                return $this->viewAdmin('treatment',[
                    "contact_name" => $contact_name,
                    "contact_company" => $contact_company,
                    "contact_email" => $contact_email,
                    "contact_phone" => $contact_phone,
                    "contact_created_at" => $contact_created_at
                ]);
            }
        }
    }

    public function newInvoice(){
        $adminModel = new Admin();
        $user = $adminModel->getUser();

        return $this->viewAdmin('new-invoice',[
            "user" => $user[0]
        ]);
    }

    public function newCompany(){
        $adminModel = new Admin();
        $user = $adminModel->getUser();

        return $this->viewAdmin('new-company',[
            "user" => $user[0]
        ]);
    }

    public function newContact(){
        $adminModel = new Admin();
        $user = $adminModel->getUser();
        $companiesNames =  $adminModel->getNamesOfCompanies();

        return $this->viewAdmin('new-contact',[
            "user" => $user[0],
            "companiesNames" => $companiesNames
        ]);
    }
}