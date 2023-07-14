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
        $adminModel = new Admin();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['new-contact'])){
                $contact_name = htmlspecialchars($_POST['new-contact__name']);
                $contact_company = htmlspecialchars($_POST['new-contact__company']);
                $contact_email = filter_var(htmlspecialchars($_POST['new-contact__email']), FILTER_SANITIZE_EMAIL);
                $contact_phone = htmlspecialchars($_POST['new-contact__phone']);
                $contact_created_at = date("Y/m/d h:m:s");
                $contact_picture = $_FILES['new-contact__picture'];

                $contact_email = $this->emailValidation($contact_email, $_POST['new-contact__email']);
                $contact_picture = $this->fileValidation($contact_picture);
                $company_id= $adminModel->getIdOfCompany($contact_company);
          
                $adminModel->addContact($contact_name, $company_id['company_id'], $contact_email, $contact_phone, $contact_created_at, $contact_picture);
                
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

    public function emailValidation($email, $POST){
        $atPos = mb_strpos($email, '@');
        $domain = mb_substr($email, $atPos + 1);

        if (checkdnsrr($domain . '.', 'MX')) {
            if(empty($POST)){
                header("Location: ".BASE_URL."dashboard?&error_email_domain");
                exit;
            } else {
                return $email;
            }
        }else{
            header("Location: ".BASE_URL."dashboard?&error_email_dns");
            exit;
        }
    }

    public function fileValidation($FILES){
        define("ALLOWED_SIZE", 2097152);
        define("SAVED_DIRECTORY", __ROOT__."/public/assets/img/contacts/");

        $allowed_extensions = array("jpeg", "jpg", "png");

        if(isset($FILES)){
            $errors = array();

            $uploaded_file_name = $FILES['name'];
            $uploaded_file_size = $FILES['size'];
            $uploaded_file_tmp  = $FILES['tmp_name'];
            $uploaded_file_type = $FILES['type'];

            $file_compositions = explode('.', $uploaded_file_name);
            $file_ext = strtolower(end($file_compositions));
            
            $saved_file_name = $uploaded_file_name; // CHANGE FILE NAME AS YOUR NEED
            if(in_array($file_ext, $allowed_extensions) === false)
                $errors[] = 'Extension not allowed, please choose a JPEG or PNG file';

            if($uploaded_file_size > ALLOWED_SIZE)
                $errors[] = 'File size is too big';

            if(empty($errors) == true) { // if no error, uploaded image is valid
                // var_dump($uploaded_file_tmp, SAVED_DIRECTORY . $saved_file_name);
                // exit;
                move_uploaded_file($uploaded_file_tmp, SAVED_DIRECTORY . $saved_file_name);
                $contact_picture = $uploaded_file_name;
                return $contact_picture;
            } else {
                print_r($errors);
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