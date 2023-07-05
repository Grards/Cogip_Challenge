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
        $query = "SELECT * FROM compagnies ORDER BY created_at DESC LIMIT :limit";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }  

    // public int $id;
    // public string $name;
    // public int $typeId;
    // public string $tva;
    // public string $createAt;
    // public string $updateAt;

    // public function __construct(int $id, string $name, int $typeId, string $tva, string $createAt, int $updateAt)
    // {
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->typeId = $typeId;
    //     $this->tva = $tva;
    //     $this->createAt = $createAt;
    //     $this->updateAt = $updateAt;
    // }

    // // public function formatPublishDate($format = 'd-m-Y')
    // // {
    // //     // TODO: return the date in the required format
    // //     $formatedDate = date($format, strtotime($this->publishDate));
    // //     return $formatedDate;
    // // }

    // public function getId(){
    //     return $this->id;
    // }

    // public function getImg(){
    //     return isset($this->urlImg) ? "View/img/" . $this->urlImg : "" ;
    // }
}

?>