<?php 

namespace App\Core;

use PDO; 

class DatabaseManager{
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            $dbHost = 'localhost';
            $dbName = 'cogip';
            $dbUser = 'root';
            $dbPass = '';

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }

        return self::$instance;
    }


    // private string $_host;
    // private string $_dbname;
    // private string $_username;
    // private string $_password;

    // public function __construct(string $host = "localhost", string $dbname = "cogip", string $username = "root", string $password = ""){
    //     $this->_host = htmlspecialchars($host);
    //     $this->_dbname = htmlspecialchars($dbname);
    //     $this->_username = htmlspecialchars($username);
    //     $this->_password = htmlspecialchars($password);
    // }

    // public function getConnectToDB(){
    //     try {
    //         $conn = new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_username, $this->_password);
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $conn;
    //     } catch(PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    //     }
    // }
}
?>