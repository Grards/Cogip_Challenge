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
        $sortField = $_GET['sort_field'] ?? 'ref';
        $sortOrder = $_GET['sort_order'] ?? 'asc';

        $validSortFields = ['ref', 'due_date', 'companies_name', 'price', 'invoices.created_at'];
        $validSortOrder = ['asc', 'desc'];

        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'ref';
        }
    
        if (!in_array($sortOrder, $validSortOrder)) {
            $sortOrder = 'asc';
        }

        $countOfInvoices = $invoicesModel->getCountOfInvoices($searchQuery);
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

    public function show(){
        require '../Resources/views/invoices.php';
    }
}
?>