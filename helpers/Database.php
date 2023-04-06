<?php

require_once(__DIR__ . '/../config/constants.php');

// class Database {
    

//     private static $instance = null;
//     private static object $connection;
    
//     private function __construct() {
//         $this::$connection = new PDO(DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
//         $this::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $this::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
//     }
    
//     public static function getInstance() {
        
//         if(is_null(self::$instance)) {
//             self::$instance = new Database();
//         }
//         return self::$connection;
        
//     }
// }


class Database
{
    private static $_pdo;

    public static function getInstance()
    {
        if (is_null(self::$_pdo)) {
            self::$_pdo = new PDO(DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
            self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$_pdo;
    }
}