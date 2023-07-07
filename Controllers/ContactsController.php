<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactsController extends Controller
{
    function allContacts(){
        $contactsModel = new Contact();

        $allContacts = $contactsModel->getAllContacts();
        $countOfContacts = $contactsModel->getCountOfContacts();
        $currentPage = (int)($_GET['page'] ?? 1); // ?? -> if doesn't exist.
        // if($currentPage <= 0){
        //     header("Location : ")
        // }
        return $this->view('contacts',[
            'allContacts' => $allContacts,
            'countOfContacts' => $countOfContacts
        ]);
    }
}
?>