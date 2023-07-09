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

        $countOfContacts = $contactsModel->getCountOfContacts();
        $contactsPerPage = 3;
         
        $pages = ceil($countOfContacts[0] / $contactsPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."contacts?&error_page");
            exit();
        }
        
        $offset = $contactsPerPage * ($currentPage-1);
        $contactsLimitedPerPage = $contactsModel->getContactsLimitedPerPage($contactsPerPage, $offset);

        return $this->view('contacts',[
            'currentPage' => $currentPage,
            'pages' => $pages,
            'contactsLimitedPerPage' => $contactsLimitedPerPage
        ]);
    }
}
?>