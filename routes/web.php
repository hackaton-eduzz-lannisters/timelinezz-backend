<?php


$router->post("/login", ["uses" => "AuthController@login"]);
$router->post("/account", ["uses" => "AuthController@create"]);
$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);

$router->get("/application", ["uses" => "ApplicationController@list", "middleware" => "auth"]);
$router->get("/timeline/{followId}", ["uses" => "TimelineController@specificUser"]);

$router->get("/application", ["uses" => "ApplicationController@list", "middleware" => "auth"]);
$router->post("/application", ["uses" => "ApplicationController@add", "middleware" => "auth"]);
$router->put("/application/{id}", ["uses" => "ApplicationController@update", "middleware" => "auth"]);
$router->get("/application/generateKey/{id}", ["uses" => "ApplicationController@generateKey", "middleware" => "auth"]);

$router->get("/action", ["uses" => "ActionController@list", "middleware" => "auth"]);
$router->post("/action", ["uses" => "ActionController@add", "middleware" => "auth"]);
$router->put("/action/{id}", ["uses" => "ActionController@update", "middleware" => "auth"]);