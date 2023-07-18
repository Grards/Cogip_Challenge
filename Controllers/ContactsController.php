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

    public function showContactDetails(){
        if (!isset($_GET['id'])) {
            return $this->view('error', ['message' => 'Contact ID not provided']);
        }
    
        $contactId = $_GET['id'];
    
        $contactModel = new Contact();
        $contact = $contactModel->getContactById($contactId);
    
        if (!$contact) {
            return $this->view('error', ['message' => 'Contact not found']);
        }
    
        return $this->view('contactDetails', ['contact' => $contact]);
    }
}
?>