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

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
            if(isset($_POST['new-contact'])){
                if(empty($_POST['new-contact__password'])){
                    $contact_name = htmlspecialchars($_POST['new-contact__name']);
                    $contact_company = htmlspecialchars($_POST['new-contact__company']);
                    $contact_email = filter_var(htmlspecialchars($_POST['new-contact__email']), FILTER_SANITIZE_EMAIL);
                    $contact_phone = htmlspecialchars($_POST['new-contact__phone']);
                    $contact_created_at = date("Y/m/d H:m:s");
                    $contact_picture = $_FILES['new-contact__picture'];
    
                    $contact_email = $this->emailValidation($contact_email, $_POST['new-contact__email']);
                    $contact_picture = $this->fileValidation($contact_picture);
                    $company_id= $adminModel->getIdOfCompany($contact_company);
              
                    $adminModel->addContact($contact_name, $company_id['company_id'], $contact_email, $contact_phone, $contact_created_at, $contact_picture);

                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "contact_name" => $contact_name,
                        "contact_company" => $contact_company,
                        "contact_email" => $contact_email,
                        "contact_phone" => $contact_phone,
                        "contact_created_at" => $contact_created_at,
                        "contact_picture" => $contact_picture
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
            if(isset($_POST['new-invoice'])){
                if(empty($_POST['new-invoice__password'])){
                    $invoice_ref = htmlspecialchars($_POST['new-invoice__ref']);
                    $invoice_company = htmlspecialchars($_POST['new-invoice__company']);
                    $invoice_due_date = htmlspecialchars($_POST['new-invoice__due_date']);
                    $invoice_price = filter_var(htmlspecialchars($_POST['new-invoice__price']),FILTER_SANITIZE_NUMBER_FLOAT);
                    $invoice_created_at = date("Y/m/d H:m:s");
    
                    $company_id= $adminModel->getIdOfCompany($invoice_company);
              
                    $adminModel->addInvoice($invoice_ref, $company_id['company_id'], $invoice_due_date, $invoice_price, $invoice_created_at);

                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "invoice_ref" => $invoice_ref,
                        "invoice_company" => $invoice_company,
                        "invoice_due_date" => $invoice_due_date,
                        "invoice_price" => $invoice_price,
                        "invoice_created_at" => $invoice_created_at
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
            if(isset($_POST['new-company'])){
                if(empty($_POST['new-company__password'])){
                    $company_name = htmlspecialchars($_POST['new-company__name']);
                    $company_type = htmlspecialchars($_POST['new-company__type_name']);
                    $company_country = htmlspecialchars($_POST['new-company__country']);
                    $company_tva = htmlspecialchars($_POST['new-company__tva']);
                    $company_created_at = date("Y/m/d H:m:s");
    
                    $type_id= $adminModel->getIdOfType($company_type);
              
                    $adminModel->addCompany($company_name, $type_id['type_id'], $company_country, $company_tva, $company_created_at);

                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "company_name" => $company_name,
                        "company_type" => $company_type,
                        "company_country" => $company_country,
                        "company_tva" => $company_tva,
                        "company_created_at" => $company_created_at
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
            if(isset($_POST['update-contact'])){
                if(empty($_POST['update-contact__password'])){
                    $contact_id = filter_var(htmlspecialchars($_POST['update-contact__id']), FILTER_SANITIZE_NUMBER_INT);
                    $contact_name = htmlspecialchars($_POST['update-contact__name']);
                    $contact_company = htmlspecialchars($_POST['update-contact__company']);
                    $contact_email = filter_var(htmlspecialchars($_POST['update-contact__email']), FILTER_SANITIZE_EMAIL);
                    $contact_phone = htmlspecialchars($_POST['update-contact__phone']);
                    $contact_update_at = date("Y/m/d H:m:s");
                    $contact_picture = $_FILES['update-contact__picture'];
    
                    $contact_email = $this->emailValidation($contact_email, $_POST['update-contact__email']);
                    $contact_picture = $this->fileValidation($contact_picture);
                    $company_id= $adminModel->getIdOfCompany($contact_company);
              
                    $adminModel->updateContact($contact_id, $contact_name, $company_id['company_id'], $contact_email, $contact_phone, $contact_update_at, $contact_picture);

                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "contact_name" => $contact_name,
                        "contact_company" => $contact_company,
                        "contact_email" => $contact_email,
                        "contact_phone" => $contact_phone,
                        "contact_update_at" => $contact_update_at,
                        "contact_picture" => $contact_picture
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
            if(isset($_POST['update-invoice'])){
                if(empty($_POST['update-invoice__password'])){
                    $invoice_id = filter_var(htmlspecialchars($_POST['update-invoice__id']), FILTER_SANITIZE_NUMBER_INT);
                    $invoice_ref = htmlspecialchars($_POST['update-invoice__ref']);
                    $invoice_company = htmlspecialchars($_POST['update-invoice__company']);
                    $invoice_due_date = htmlspecialchars($_POST['update-invoice__due_date']);
                    $invoice_price = htmlspecialchars($_POST['update-invoice__price']);
                    $invoice_update_at = date("Y/m/d H:m:s");

                    $company_id= $adminModel->getIDOfCompany($invoice_company);
              
                    $adminModel->updateInvoice($invoice_id, $invoice_ref, $company_id['company_id'], $invoice_due_date, $invoice_price, $invoice_update_at);
                    
                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "invoice_ref" => $invoice_ref,
                        "invoice_company" => $invoice_company,
                        "invoice_due_date" => $invoice_due_date,
                        "invoice_price" => $invoice_price,
                        "invoice_update_at" => $invoice_update_at
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
            if(isset($_POST['update-company'])){
                if(empty($_POST['update-company__password'])){
                    $company_id = filter_var(htmlspecialchars($_POST['update-company__id']), FILTER_SANITIZE_NUMBER_INT);
                    $company_name = htmlspecialchars($_POST['update-company__name']);
                    $company_type = htmlspecialchars($_POST['update-company__type']);
                    $company_country = htmlspecialchars($_POST['update-company__country']);
                    $company_tva = htmlspecialchars($_POST['update-company__tva']);
                    $company_update_at = date("Y/m/d H:m:s");

                    $type_id= $adminModel->getIdOfType($company_type);
              
                    $adminModel->updateCompany($company_id, $company_name, $type_id['type_id'], $company_country, $company_tva, $company_update_at);

                    $user = $adminModel->getUser();
                    
                    return $this->viewAdmin('treatment',[
                        "user" => $user[0],
                        "company_name" => $company_name,
                        "company_type" => $company_type,
                        "company_country" => $company_country,
                        "company_tva" => $company_tva,
                        "company_update_at" => $company_update_at
                    ]);
                }else{
                    header("Location: ".BASE_URL."dashboard?&crud-success");
                    exit;
                }
            }
        }
    }

    public function emailValidation($email, $POST){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
        }else {
            header("Location: ".BASE_URL."dashboard?&error_invalid_email");
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


            if (!in_array($file_ext, $allowed_extensions)) {
                $errors[] = 'Extension not allowed, please choose a JPEG or PNG file';
            }
    
            if ($uploaded_file_size > ALLOWED_SIZE) {
                $errors[] = 'File size is too big';
            }
    
            if (empty($errors)) {
                // Generate a unique file name
                $saved_file_name = uniqid().'.'.$file_ext;
                $saved_file_path = SAVED_DIRECTORY . $saved_file_name;
    
                if (move_uploaded_file($uploaded_file_tmp, $saved_file_path)) {
                    $contact_picture = $saved_file_name;
                    return $contact_picture;
                } else {
                    $errors[] = 'Failed to save the file';
                }
            } else {
                print_r($errors);
            }
        }
    }

    public function newInvoice(){
        $adminModel = new Admin();

        $user = $adminModel->getUser();
        $companiesNames =  $adminModel->getNamesOfCompanies();


        $invoicesModel = new Invoice();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."dashboard/invoices?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."dashboard/invoices");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."dashbaord/invoices?&error_page");
            exit();
        }

        $searchQuery = $_GET['search'] ?? '';
        $sortField = $_GET['sort_field'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? '';

        $validSortFields = ['ref', 'due_date', 'companies_name', 'price', 'invoices.created_at'];
        $validSortOrder = ['asc', 'desc'];

        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'ref';
        }
    
        if (!in_array($sortOrder, $validSortOrder)) {
            $sortOrder = 'asc';
        }

        $countOfInvoices = $invoicesModel->getCountOfInvoices($searchQuery, $sortField, $sortOrder);
        $invoicesPerPage = 10;
         
        $pages = ceil($countOfInvoices[0] / $invoicesPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."dashboard/invoices?&error_page");
            exit();
        }
        
        $offset = $invoicesPerPage * ($currentPage-1);
       
        $invoicesLimitedPerPage = $invoicesModel->getInvoicesLimitedPerPage($invoicesPerPage, $offset, $searchQuery, $sortField, $sortOrder);

        return $this->viewAdmin('invoices',[
            "user" => $user[0],
            "companiesNames" => $companiesNames,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'invoicesLimitedPerPage' => $invoicesLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
        ]);
    }

    public function newCompany(){
        $adminModel = new Admin();
        $user = $adminModel->getUser();
        $typesNames = $adminModel->getNamesOfTypes();


        $companiesModel = new Company();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."dashboard/companies?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."dashboard/companies");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."dashboard/companies?&error_page");
            exit();
        }

        $searchQuery = $_GET['search'] ?? '';
        $sortField = $_GET['sort_field'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? '';

        $validSortFields = ['companies.name', 'tva', 'country', 'type_id', 'companies.created_at'];
        $validSortOrder = ['asc', 'desc'];

        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'companies.name';
        }
    
        if (!in_array($sortOrder, $validSortOrder)) {
            $sortOrder = 'asc';
        }

        $countOfCompanies = $companiesModel->getCountOfCompanies($searchQuery, $sortField, $sortOrder);
        $companiesPerPage = 10;
         
        $pages = ceil($countOfCompanies[0] / $companiesPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."dashboard/companies?&error_page");
            exit();
        }
        
        $offset = $companiesPerPage * ($currentPage-1);
        
        $companiesLimitedPerPage = $companiesModel->getCompaniesLimitedPerPage($companiesPerPage, $offset, $searchQuery, $sortField, $sortOrder);


        return $this->viewAdmin('companies',[
            "user" => $user[0],
            "typesNames" => $typesNames,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'companiesLimitedPerPage' => $companiesLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
        ]);
    }

    public function newContact(){
        $adminModel = new Admin();
        $user = $adminModel->getUser();
        $companiesNames =  $adminModel->getNamesOfCompanies();

        $contactsModel = new Contact();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."dashboard/contacts?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."dashboard/contacts");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."dashboard/contacts?&error_page");
            exit();
        }

        $searchQuery = $_GET['search'] ?? '';
        $sortField = $_GET['sort_field'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? '';

        $validSortFields = ['contacts_name', 'contacts_phone', 'contacts_email', 'company_id', 'contacts_created_at'];
        $validSortOrder = ['asc', 'desc'];

    if (!in_array($sortField, $validSortFields)) {
        $sortField = 'contacts_name';
    }

    if (!in_array($sortOrder, $validSortOrder)) {
        $sortOrder = 'asc';
    }

        $countOfContacts = $contactsModel->getCountOfContacts($searchQuery, $sortField, $sortOrder);
        $contactsPerPage = 10;
         
        $pages = ceil($countOfContacts[0] / $contactsPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."dashboard/contacts?&error_page");
            exit();
        }
        
        $offset = $contactsPerPage * ($currentPage-1);
        
        $contactsLimitedPerPage = $contactsModel->getContactsLimitedPerPage($contactsPerPage, $offset, $searchQuery, $sortField, $sortOrder);

        return $this->viewAdmin('contacts',[
            "user" => $user[0],
            "companiesNames" => $companiesNames,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'contactsLimitedPerPage' => $contactsLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
        ]);
    }

    public function updateContact(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $user = $adminModel->getUser();
            $companiesNames =  $adminModel->getNamesOfCompanies();
        
            $idContact = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $contact = $adminModel->getContact($idContact);
            $countOfContacts = $adminModel->getLastId('contacts');
        
            return $this->viewAdmin('update-contact',[
                "user" => $user[0],
                "crud" => "update_contact",
                "companiesNames" => $companiesNames,
                "contact" => $contact,
                "idContact" => $idContact,
                "countOfContacts" => $countOfContacts['MAX(id)'],
            ]);
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }

    public function updateInvoice(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $user = $adminModel->getUser();
            $companiesNames =  $adminModel->getNamesOfCompanies();

            $idInvoice = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $invoice = $adminModel->getInvoice($idInvoice);
            $countOfInvoices= $adminModel->getLastId('invoices');
    
            return $this->viewAdmin('update-invoice',[
                "user" => $user[0],
                "crud" => "update_invoice",
                "companiesNames" => $companiesNames,
                "invoice" => $invoice,
                "idInvoice" => $idInvoice,
                "countOfInvoices" => $countOfInvoices
            ]);
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }
    
    public function updateCompany(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $user = $adminModel->getUser();
            $typesNames = $adminModel->getNamesOfTypes();

            $idCompany = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $company = $adminModel->getCompany($idCompany);
            $countOfCompanies = $adminModel->getLastId('companies');

            return $this->viewAdmin('update-company',[
                "user" => $user[0],
                "crud" => "update_company",
                "typesNames" => $typesNames,
                "company" => $company,
                "idCompany" => $idCompany,
                "countOfCompanies" => $countOfCompanies
            ]);
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }

    public function deleteContact(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $id = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $adminModel->deleteContact($id); 

            header("Location: ".BASE_URL."dashboard/contacts#dash_invoices_table?deleted=ok");
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }

    public function deleteCompany(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $id = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $adminModel->deleteCompany($id); 

            header("Location: ".BASE_URL."dashboard/companies#dash_invoices_table?deleted=ok");
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }

    public function deleteInvoice(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $adminModel = new Admin();
            $id = filter_var(htmlspecialchars($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
            $adminModel->deleteInvoice($id); 

            header("Location: ".BASE_URL."dashboard/invoices#dash_invoices_table?deleted=ok");
        }else{
            header("Location: ".BASE_URL."dashboard?no-entry");
            exit;
        }
    }
}