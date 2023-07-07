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
        $query = "SELECT id, ref, id_company, created_at, updated_at, due_date, price FROM invoices ORDER BY due_date DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllInvoices() {
        $query = "SELECT id, ref, id_company, created_at, updated_at FROM invoices";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_NUM)[0];
    }
}