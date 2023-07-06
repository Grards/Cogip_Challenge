<?php

namespace App\Models;

use App\Core\DatabaseManager;

class Invoice {
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getLatestInvoices($limit) {
        $query = "SELECT id, ref, id_company, created_at, updated_at FROM invoices ORDER BY created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}