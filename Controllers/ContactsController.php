<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactsController extends Controller
{
    function listsOfContacts(){
        $contactsModel = new Contact();
        
        $page = ($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            header("Location: ".BASE_URL."contacts?error_page");
            exit();
        }
        if($page === '1'){
            header("Location: ".BASE_URL."contacts");
            exit();
        }

        $currentPage = (int)$page;
        if($currentPage <= 0){
            header("Location: ".BASE_URL."contacts?&error_page");
            exit();
        }

        $searchQuery = $_GET['search'] ?? '';
        $sortField = $_GET['sort_field'] ?? '';
        $sortOrder = $_GET['sort_order'] ?? '';

        $validSortFields = ['name', 'phone', 'email', 'company_id', 'created_at'];
        $validSortOrder = ['asc', 'desc'];

    if (!in_array($sortField, $validSortFields)) {
        $sortField = 'name';
    }

    if (!in_array($sortOrder, $validSortOrder)) {
        $sortOrder = 'asc';
    }

        $countOfContacts = $contactsModel->getCountOfContacts($searchQuery, $sortField, $sortOrder);
        $contactsPerPage = 10;
         
        $pages = ceil($countOfContacts[0] / $contactsPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."contacts?&error_page");
            exit();
        }
        
        $offset = $contactsPerPage * ($currentPage-1);
        
        $contactsLimitedPerPage = $contactsModel->getContactsLimitedPerPage($contactsPerPage, $offset, $searchQuery, $sortField, $sortOrder);

        return $this->view('contacts',[
            'currentPage' => $currentPage,
            'pages' => $pages,
            'contactsLimitedPerPage' => $contactsLimitedPerPage,
            'searchQuery' => $searchQuery,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder
            
        ]);
    }

    public function show(){
        require '../Resources/views/contacts.php';
    }
}
?>