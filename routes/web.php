<?php

$router->get("/timeline", ["uses" => "TimelineController@allUsers"]);