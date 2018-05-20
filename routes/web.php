<?php

$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);
$router->post("/application", ["uses" => "ApplicationController@add"]);
$router->put("/application/{id}", ["uses" => "ApplicationController@update"]);
$router->put("/application/generateKey/{id}", ["uses" => "ApplicationController@generateKey"]);