<?php 


namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactsController extends Controller
{
    function allContacts(){
        $contactsModel = new Contact();

        $allContacts = $contactsModel->getAllContacts();

        return $this->view('contacts',[
            'allContacts' => $allContacts
        ]);
    }
}
?>