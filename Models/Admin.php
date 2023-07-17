<?php

namespace App\Models;

use App\Core\DatabaseManager;

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getUser($userID = 3){
        $query = "SELECT users.id as users_id, users.first_name as users_first_name, users.last_name as users_last_name, users.picture as users_picture 
        FROM users
        WHERE users.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $userID, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getContact($idContact){
        $query = "SELECT contacts.id as contacts_id, contacts.name as contacts_name, contacts.company_id as contacts_company_id, contacts.email as contacts_email, contacts.phone as contacts_phone, contacts.created_at as contacts_created_at, contacts.updated_at as contacts_updated_at, contacts.picture as contacts_picture, companies.id as companies_id, companies.name as companies_name 
        FROM contacts
        JOIN companies ON contacts.company_id = companies.id
        WHERE contacts.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idContact, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getCompany($idContact){
        $query = "SELECT companies.id as companies_id, companies.name as companies_name, companies.type_id as companies_type_id, companies.country as companies_country, companies.tva as companies_tva, companies.created_at as companies_created_at, companies.updated_at as companies_updated_at, types.id as types_id, types.name as types_name 
        FROM companies
        JOIN types ON companies.type_id = types.id
        WHERE companies.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $idContact, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getNamesOfCompanies(){
        $query = "SELECT DISTINCT companies.name as companies_name
        FROM companies";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNamesOfTypes(){
        $query = "SELECT DISTINCT types.name as types_name
        FROM types";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getIDOfCompany($contact_company){
        $query = "SELECT DISTINCT companies.id as company_id
        FROM companies
        WHERE companies.name = :contact_company";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':contact_company', $contact_company, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getIDOfType($company_type){
        $query = "SELECT DISTINCT types.id as type_id
        FROM types
        WHERE types.name = :company_type";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':company_type', $company_type, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getLastId($table){
        $query = "SELECT MAX(id)
        FROM " . $table;
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function addContact($contact_name, $company_id, $contact_email, $contact_phone, $contact_created_at, $contact_picture){
        $query = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at, picture)
        VALUES (:name, :companyId, :email, :phone, :createdAt, :updatedAt, :picture)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $contact_name, \PDO ::PARAM_STR);
        $statement->bindValue(':companyId', $company_id, \PDO ::PARAM_INT);
        $statement->bindValue(':email', $contact_email, \PDO ::PARAM_STR);
        $statement->bindValue(':phone', $contact_phone, \PDO ::PARAM_STR);
        $statement->bindValue(':createdAt', $contact_created_at, \PDO ::PARAM_STR);
        $statement->bindValue(':updatedAt', $contact_created_at, \PDO ::PARAM_STR);
        $statement->bindValue(':picture', $contact_picture, \PDO ::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addInvoice($invoice_ref, $company_id, $invoice_due_date, $invoice_price, $invoice_created_at){
        $query = "INSERT INTO invoices (ref, id_company, due_date, price, created_at, updated_at)
        VALUES (:ref, :idCompany, :dueDate, :price, :createdAt, :updatedAt)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':ref', $invoice_ref, \PDO ::PARAM_STR);
        $statement->bindValue(':idCompany', $company_id, \PDO ::PARAM_INT);
        $statement->bindValue(':dueDate', $invoice_due_date, \PDO ::PARAM_STR);
        $statement->bindValue(':price', $invoice_price, \PDO ::PARAM_STR);
        $statement->bindValue(':createdAt', $invoice_created_at, \PDO ::PARAM_STR);
        $statement->bindValue(':updatedAt', $invoice_created_at, \PDO ::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addCompany($company_name, $type_id, $company_country, $company_tva, $company_created_at){
        $query = "INSERT INTO companies (name, type_id, country, tva, created_at, updated_at)
        VALUES (:name, :typeID, :country, :tva, :createdAt, :updatedAt)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $company_name, \PDO::PARAM_STR);
        $statement->bindValue(':typeID', $type_id, \PDO ::PARAM_INT);
        $statement->bindValue(':country', $company_country, \PDO ::PARAM_STR);
        $statement->bindValue(':tva', $company_tva, \PDO ::PARAM_STR);
        $statement->bindValue(':createdAt', $company_created_at, \PDO ::PARAM_STR);
        $statement->bindValue(':updatedAt', $company_created_at, \PDO ::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateContact($contact_id, $contact_name, $company_id, $contact_email, $contact_phone, $contact_update_at, $contact_picture){
        $query = "UPDATE contacts
        SET name = :name, company_id = :companyId, email = :email, phone = :phone, updated_at = :updatedAt, picture = :picture
        WHERE id = " . $contact_id;
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $contact_name, \PDO ::PARAM_STR);
        $statement->bindValue(':companyId', $company_id, \PDO ::PARAM_INT);
        $statement->bindValue(':email', $contact_email, \PDO ::PARAM_STR);
        $statement->bindValue(':phone', $contact_phone, \PDO ::PARAM_STR);
        $statement->bindValue(':updatedAt', $contact_update_at, \PDO ::PARAM_STR);
        $statement->bindValue(':picture', $contact_picture, \PDO ::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    } 
}