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

    public function getNamesOfCompanies(){
        $query = "SELECT DISTINCT companies.name as companies_name
        FROM companies";
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

    public function addContact($contact_name, $company_id, $contact_email, $contact_phone, $contact_created_at, $contact_picture){
        $query = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at, picture)
        VALUES (:name, :companyId, :email, :phone, :createdAt, :updatedAt, :picture)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':name', $contact_name);
        $statement->bindValue(':companyId', $company_id);
        $statement->bindValue(':email', $contact_email);
        $statement->bindValue(':phone', $contact_phone);
        $statement->bindValue(':createdAt', $contact_created_at);
        $statement->bindValue(':updatedAt', $contact_created_at);
        $statement->bindValue(':picture', $contact_picture);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}