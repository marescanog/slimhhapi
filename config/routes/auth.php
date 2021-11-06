<?php 

$app->group("/auth",function() use ($app){

    $app->post("/login","AuthController:Login");
    $app->post("/register","AuthController:Register");
});


















?>