<?php 

namespace  App\Db;

use PDO;
use PDOException;

// // Comment out if pushing to production, otherwise uncomment when in development
// use Dotenv\Dotenv;

class DB {
    // This is the Database connection class which can be called to start a PDO connection
    public function connect(){
        
        // // Comment out if pushing to production, otherwise uncomment when in development
        // require_once __DIR__ . '/../../vendor/autoload.php';
        // $dotenv = Dotenv::createImmutable(__DIR__."\\..\\..\\");
        // $dotenv->load();


        try{

            if ($_ENV['ENVIRONMENT'] == "PROD") {
                // PRODUCTION DATABASE CONNECTION
                $conn = new \PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";charset=utf8mb4", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            } 
            
            if ($_ENV['ENVIRONMENT'] == "DEV"){
                // DEVELOPMENT DATABASE CONNECTION
                $conn = new \PDO("mysql:host=".$_ENV['DB_DEV_HOST'].";dbname=".$_ENV['DB_DEV_NAME'].";charset=utf8mb4", $_ENV['DB_DEV_USERNAME'], $_ENV['DB_DEV_PASSWORD']);
            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch(PDOException $e){
            echo "Database Connection Error, please check your connection file.";
            throw new \PDOException($e->getMessage());
        }
    }
}





?>