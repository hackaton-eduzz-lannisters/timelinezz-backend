<?php

$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);

$router->get("/application", ["uses" => "ApplicationController@list"]);
$router->get("/timeline/{followId}", ["uses" => "TimelineController@specificUser"]);

$router->get("/application", ["uses" => "ApplicationController@list"]);
$router->post("/application", ["uses" => "ApplicationController@add"]);
$router->put("/application/{id}", ["uses" => "ApplicationController@update"]);
$router->get("/application/generateKey/{id}", ["uses" => "ApplicationController@generateKey"]);

$router->get("/action", ["uses" => "ActionController@list"]);
$router->post("/action", ["uses" => "ActionController@add"]);
$router->put("/action/{id}", ["uses" => "ActionController@update"]);