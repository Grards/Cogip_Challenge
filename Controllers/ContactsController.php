<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactsController extends Controller
{
    function allContacts(){
        $contactsModel = new Contact();
        $allContacts = $contactsModel->getAllContacts();
        
        
        $currentPage = (int)($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        if($currentPage <= 0){
            header("Location: ".BASE_URL."contacts?error_page");
        }

        $countOfContacts = $contactsModel->getCountOfContacts();
        $contactsPerPage = 10;
  
        $pages = ceil($countOfContacts[0] / $contactsPerPage);
        if($currentPage > $pages){
            header("Location: ".BASE_URL."contacts?error_page");
        }  

        return $this->view('contacts',[
            'allContacts' => $allContacts,
            'countOfContacts' => $countOfContacts
        ]);
    }
}
?>