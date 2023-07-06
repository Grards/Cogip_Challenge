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

        $query = "SELECT id, name, company_id, email, phone, created_at, updated_at country FROM contacts ORDER BY created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);

    }
}