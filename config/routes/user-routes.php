<?php

$app->get("/user/check-number","UserController:is_in_DB");

$app->get("/user/check-number","UserController:get_all");

$app->post("/user/register","UserController:register_user");
