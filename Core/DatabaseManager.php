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
            include 'Config.php';

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }

        return self::$instance;
    }
}