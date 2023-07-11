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
        $query = "SELECT invoices.id as invoices_id, invoices.ref as invoices_ref, invoices.id_company as invoices_id_company, invoices.created_at as invoices_created_at, invoices.updated_at as invoices_updated_at, invoices.due_date as invoices_due_date, invoices.price as invoices_price, companies.id as companies_id, companies.name as companies_name
        FROM invoices
        INNER JOIN invoices ON invoices.id_company = invoices.id
        ORDER BY due_date DESC 
        LIMIT :limit";
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

    public function getCountOfInvoices() {
        $query = "SELECT COUNT(id) FROM invoices";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_NUM);
    }

    public function getInvoicesLimitedPerPage($invoicesPerPage, $offset, $searchQuery) {
        $query = "SELECT invoices.id as invoices_id, invoices.ref as invoices_ref, invoices.id_company as invoices_id_company, invoices.created_at as invoices_created_at, invoices.updated_at as invoices_updated_at, invoices.due_date as invoices_due_date, invoices.price as invoices_price, companies.id as companies_id, companies.name as companies_name
        FROM invoices
        INNER JOIN companies ON invoices.id_company = companies.id
        WHERE companies.name LIKE :query 
        ORDER BY invoices.created_at DESC
        LIMIT $invoicesPerPage OFFSET $offset";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}