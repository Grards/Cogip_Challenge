<?php

namespace App\Models;

use App\Core\DatabaseManager;

class Contact {
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getLatestContacts($limit) {

        $query = "SELECT id, name, company_id, email, phone, created_at, updated_at FROM contacts ORDER BY created_at DESC LIMIT :limit";
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

    public function getCountOfContacts() {
        $query = "SELECT COUNT(id) FROM contacts";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_NUM);
    }

    public function getContactsLimitedPerPage($contactsPerPage, $offset, $searchQuery){
        $query = "SELECT id, name, company_id, email, phone, created_at, updated_at FROM contacts WHERE name LIKE :query ORDER BY name DESC LIMIT $contactsPerPage OFFSET $offset";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}