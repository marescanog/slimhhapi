<?php

namespace App\Controllers;

use App\Models\GuestEntry;
use App\Requests\CustomRequestHandler;
use App\Response\CustomResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Respect\Validation\Validator as v;
use App\Validation\Validator;
use App\db\DB;


class GuestEntryController
{

    protected  $customResponse;

    protected  $guestEntry;

    protected  $validator;

    public function  __construct()
    {
         $this->customResponse = new CustomResponse();

         $this->guestEntry = new GuestEntry();

         $this->validator = new Validator();
    }

    public function createGuest(Request $request,Response $response)
    {

        try{
            $db = new DB();
            $conn = $db->connect();
            
            $status = 400;
            $message = "";
    
            $sql = "SELECT * FROM hh_user";
            $stmt = $conn->query($sql);
            $users = $stmt->fetchAll();
            $db = null;
            
            $message = "";
            $status = 200;
            $data = array(
                "message" => $message,
                "status" => $status,
                "data" => $users,
            );
    
            $this->customResponse->is200Response($response, $data);
    
        } catch (PDOException $e){
            $status = 500;
            $error = array(
                "message" => "There was an error processing your request",
                "status" => $status,
                "data" => array(),
                "error" => $e->getMessage(),
            );

            $this->customResponse->is200Response($response, $error);
        }

    }

    public function viewGuests(Request $request,Response $response)
    {
        $responseMessage = "View guest works";
        $this->customResponse->is200Response($response, $responseMessage);
    }


    public function getSingleGuest(Request $request,Response $response,$id)
    {

        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function editGuest(Request $request,Response $response,$id)
    {

        $responseMessage = "Edit guest user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function deleteGuest(Request $request,Response $response,$id)
    {
        $responseMessage = "Delete guest user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function countGuests(Request $request,Response $response)
    {
        $responseMessage = "Count guest works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

}