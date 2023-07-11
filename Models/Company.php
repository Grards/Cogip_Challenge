<?php

namespace App\Models;

use App\Core\DatabaseManager;

class Company
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getLatestCompanies($limit)
    {
        $query = "SELECT companies.id as companies_id, companies.name as companies_name, companies.type_id as companies_type_id, companies.country as companies_country, companies.tva as companies_tva, companies.created_at as companies_created_at, companies.updated_at as companies_updated_at, types.id as types_id, types.name as types_name 
        FROM companies 
        INNER JOIN types ON companies.type_id = types.id  
        ORDER BY companies.created_at DESC 
        LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllCompanies() {
        $query = "SELECT id, name, type_id, country, tva, created_at, updated_at FROM companies";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCountOfCompanies($searchQuery) {
        $query = "SELECT COUNT(id) FROM companies WHERE name LIKE :query ORDER BY name";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_NUM);
    }

    public function getCompaniesLimitedPerPage($companiesPerPage, $offset, $searchQuery){
        $query = "SELECT companies.id as companies_id, companies.name as companies_name, companies.type_id as companies_type_id, companies.country as companies_country, companies.tva as companies_tva, companies.created_at as companies_created_at, companies.updated_at as companies_updated_at, types.id as types_id, types.name as types_name
        FROM companies 
        INNER JOIN types ON companies.type_id = types.id
        WHERE companies.name LIKE :query 
        ORDER BY companies.name 
        DESC LIMIT $companiesPerPage OFFSET $offset";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':query', '%' . $searchQuery . '%');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>