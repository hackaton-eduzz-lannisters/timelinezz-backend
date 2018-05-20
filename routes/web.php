<?php

$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);
$router->get("/timeline/{followId}", ["uses" => "TimelineController@specificUser"]);
$router->post("/application", ["uses" => "ApplicationController@add"]);