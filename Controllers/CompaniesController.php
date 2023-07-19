<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Contact;

class CompaniesController extends Controller
{
    function listsOfCompagnies(){
        $companiesModel = new Company();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."companies?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."companies");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."companies?&error_page");
            exit();
        }

        $searchQuery = $_GET['search'] ?? '';
        $searchQuery = preg_replace('/[^a-zA-Z]/', '', $searchQuery);
        $searchQuery = htmlspecialchars($searchQuery);
        $searchQuery = trim($searchQuery);
        $maxCharacters = 10;
        $searchQuery = substr($searchQuery, 0, $maxCharacters);
        
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
            header("Location: ".BASE_URL."companies?&error_page");
            exit();
        }
        
        $offset = $companiesPerPage * ($currentPage-1);
        
        $companiesLimitedPerPage = $companiesModel->getCompaniesLimitedPerPage($companiesPerPage, $offset, $searchQuery, $sortField, $sortOrder);

        return $this->view('companies',[
            'currentPage' => $currentPage,
            'pages' => $pages,
            'companiesLimitedPerPage' => $companiesLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
        ]);

    }

    public function showCompanyDetails(){
        if (!isset($_GET['id'])) {
            return $this->view('error', ['message' => 'Company ID not provided']);
        }
    
        $companyId = $_GET['id'];
        $companyModel = new Company();
        $company = $companyModel->getcompanyById($companyId);
        
    
        if (!$company) {
            return $this->view('error', ['message' => 'Company not found']);
        }

        $invoiceModel = new Invoice();
        $limit = 5;
        $invoices = $invoiceModel->getLatestInvoicesByCompanyId($limit, $companyId);

        $contactModel = new Contact();
        $contacts = $contactModel->getContactsByCompanyId($companyId);
    
        return $this->view('companyDetails', ['company' => $company, 'invoices' => $invoices, 'contacts' => $contacts]);
    }    
}
?>