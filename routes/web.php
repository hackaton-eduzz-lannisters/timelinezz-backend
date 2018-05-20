<?php

$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);
$router->post("/application", ["uses" => "ApplicationController@add"]);