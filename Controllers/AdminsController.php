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
                $contact_email = filter_var(htmlspecialchars($_POST['new-contact__email']), FILTER_SANITIZE_EMAIL);
                $contact_phone = htmlspecialchars($_POST['new-contact__phone']);
                $contact_created_at = date("Y/m/d h:m:s");
                $contact_picture = "";

                if(isset($_POST['new-contact__picture'])){
                    // File validation
                    define("ALLOWED_SIZE", 2097152);    // CHANGE ALLOWED SIZE AS YOUR NEED
                    define("SAVED_DIRECTORY", IMG."contacts/"); // CHANGE SAVED DIRECTORY AS YOUR NEED

                    $allowed_extensions = array("jpeg", "jpg", "png"); // CHANGE allowed extension AS YOUR NEED

                    if(isset($_FILES['new-contact__picture'])){
                        $errors = array();
                        
                        $uploaded_file_name = $_FILES['new-contact__picture']['name'];
                        $uploaded_file_size = $_FILES['new-contact__picture']['size'];
                        $uploaded_file_tmp  = $_FILES['new-contact__picture']['tmp_name'];
                        $uploaded_file_type = $_FILES['new-contact__picture']['type'];

                        $file_compositions = explode('.', $uploaded_file_name);
                        $file_ext = strtolower(end($file_compositions));
                        
                        $saved_file_name = $uploaded_file_name; // CHANGE FILE NAME AS YOUR NEED
                        if(in_array($file_ext, $allowed_extensions) === false)
                            $errors[] = 'Extension not allowed, please choose a JPEG or PNG file';

                        if($uploaded_file_size > ALLOWED_SIZE)
                            $errors[] = 'File size is too big';

                        if(empty($errors) == true) { // if no error, uploaded image is valid
                            move_uploaded_file($uploaded_file_tmp, SAVED_DIRECTORY . $saved_file_name);
                            $contact_picture = $uploaded_file_name;
                        } else {
                            print_r($errors);
                        }
                    }
                }

                return $this->viewAdmin('treatment',[
                    "contact_name" => $contact_name,
                    "contact_company" => $contact_company,
                    "contact_email" => $contact_email,
                    "contact_phone" => $contact_phone,
                    "contact_created_at" => $contact_created_at,
                    "contact_picture" => $contact_picture
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