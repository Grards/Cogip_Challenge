<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Invoice;

class InvoicesController extends Controller
{
    public function listsOfInvoices(){
        $invoicesModel = new Invoice();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."invoices?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."invoices");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."invoices?&error_page");
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
            header("Location: ".BASE_URL."invoices?&error_page");
            exit();
        }
        
        $offset = $invoicesPerPage * ($currentPage-1);
       
        $invoicesLimitedPerPage = $invoicesModel->getInvoicesLimitedPerPage($invoicesPerPage, $offset, $searchQuery, $sortField, $sortOrder);

        return $this->view('invoices',[
            'currentPage' => $currentPage,
            'pages' => $pages,
            'invoicesLimitedPerPage' => $invoicesLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
        ]);
    }

    public function showInvoiceDetails()
    {
        if (!isset($_GET['id'])) {
            return $this->view('error', ['message' => 'Invoice ID not provided']);
        }
    
        $invoiceId = $_GET['id'];
    
        $invoiceModel = new Invoice();
        $invoice = $invoiceModel->getInvoiceById($invoiceId);
    
        if (!$invoice) {
            return $this->view('error', ['message' => 'Invoice not found']);
        }
    
        return $this->view('invoiceDetails', ['invoice' => $invoice]);
    }    
}

?>