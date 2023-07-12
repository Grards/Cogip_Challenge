<?php

namespace App\Models;

use App\Core\DatabaseManager;

class Contact 
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getLatestContacts($limit) {

        $query = "SELECT contacts.id as contacts_id, contacts.name  as contacts_name, contacts.company_id as contacts_company_id, contacts.email as contacts_email, contacts.phone as contacts_phone, contacts.created_at as contacts_created_at, contacts.updated_at as contacts_updated_at, companies.id as companies_id, companies.name as companies_name
        FROM contacts 
        INNER JOIN companies ON contacts.company_id = companies.id 
        ORDER BY contacts.created_at DESC 
        LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getAllContacts() {
        $query = "SELECT id, name, company_id, email, phone, created_at, updated_at FROM contacts";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCountOfContacts($searchQuery) {
        $query = "SELECT COUNT(id) FROM contacts WHERE name LIKE :query ORDER BY name";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_NUM);
    }

    public function getContactsLimitedPerPage($contactsPerPage, $offset, $searchQuery, $sortField = 'name', $sortOrder = 'asc'){
        
        $query = "SELECT id, name, company_id, email, phone, created_at, updated_at
        FROM contacts
        WHERE name LIKE :query";
        $query .= " ORDER BY $sortField $sortOrder";
        $query .= " LIMIT $contactsPerPage OFFSET $offset";

        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}