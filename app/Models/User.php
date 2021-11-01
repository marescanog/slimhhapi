<?php

namespace App\Models;

use App\Db\DB;
use PDO;
use PDOException;

class User 
{

    // DB stuff
    private $conn;
    private $table = 'hh_user';

    // Properties
    private $user_id;
    private $user_type;
    private $user_status;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $date_time_created;
    private $messenger_status;
    private $timestamp_last_active;

    // Constructor 
    public function __construct(){
    }

    // @name    Check Phone Number
    // @params  user's phone number
    // @returns true if number is in db or false on failure/number is not in db.
    public function is_in_db($phone_number){
        try{

            $db = new DB();
            $conn = $db->connect();

            // CREATE query
        //     $query = "SELECT 
        //     phone_no as phone_no 
        // FROM 
        //     hh_user WHERE phone_no = :phone";
            $query = "SELECT * FROM `hh_user` WHERE phone_no = :phone";
            
            // Prepare statement
            $stmt =  $conn->prepare($query);
            
            // Only fetch if prepare succeeded
            if ($stmt !== false) {
                $stmt->bindparam(':phone', $phone_number);
                $stmt->execute();
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            }
            $stmt=null;
            $db=null;

            return $result == false ? false : true;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}