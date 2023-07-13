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

        $name = null;
        $company = null;
        $email = null;
        $phone = null;
        $created_at = null;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['new-contact'])){
                $name = htmlspecialchars($_POST['new-contact__name']);
                $company = htmlspecialchars($_POST['new-contact__company']);
                $email = htmlspecialchars($_POST['new-contact__email']);
                $phone = htmlspecialchars($_POST['new-contact__phone']);
                $created_at = date("Y/m/d hh:mm:ss");

                if(isset($_POST['new-contact__picture'])){
                    // Picture treatment
                }
            }
        }

        return $this->viewAdmin('treatment',[
            "name" => $name,
            "company" => $company,
            "email" => $email,
            "phone" => $phone,
            "created_at" => $created_at
        ]);
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

        return $this->viewAdmin('new-contact',[
            "user" => $user[0]
        ]);
    }
}