<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;

class HomeController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
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
 

        return $this->view('welcome',[
            "name" => "Cogip",
            "invoices" => $invoices,
            "contacts" => $contacts,
            "companies" => $companies
        ]);
    }

    public function invoices()
    {
        return $this->view('invoices',["" => ""]);
    }

    public function contacts()
    {
        return $this->view('contacts',["" => ""]);
    }

    public function companies()
    {
        return $this->view('companies',["" => ""]);
    }

    
    // public function getCompanies(){
    //     $conn = $this->getConnectToDB();
    //     $datas = [];
    //     try {
    //         $query = $conn->prepare('SELECT id, name, type_id, country, tva, created_at, updated_at FROM cogip' );
    //         $query->execute();
    //         $datas = $query->fetchAll();
    //     } catch (Exception $e) {
    //         die("<p>Oh noes! There's an error in the query!</p>");
    //     }

    //     $rawCompanies = [];
    //     foreach ($datas as $data){
    //         $rawCompanies[] = [
    //             'id' => $data['id'],
    //             'name' => $data['name'],
    //             'type_id' => $data['type_id'],
    //             'country' => $data['country'],
    //             'tva' => $data['tva'],
    //             'created_at' => $data['created_at'],
    //             'updated_at' => $data['updated_at']
    //         ];
    //     }

    //     $companies = [];
    //     foreach ($rawCompanies as $rawCompanie) {
    //         $companies[] = new Company($rawCompanie['id'], $rawCompanie['name'], $rawCompanie['type_id'], $rawCompanie['country'], $rawCompanie['tva'], $rawCompanie['created_at'], $rawCompanie['updated_at']);
    //     }

    //     return $companies;
    // }
}