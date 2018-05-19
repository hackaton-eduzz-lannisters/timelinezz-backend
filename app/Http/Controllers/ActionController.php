<?php

namespace App\Http\Controllers;

use App\ServiceInterfaces\ActionServiceInterface;

class ActionController extends Controller
{
    private $actionService;
    
    public function __construct(ActionServiceInterface $actionService)
    {
        $this->actionService = $actionService;
    }
}