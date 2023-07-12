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
}