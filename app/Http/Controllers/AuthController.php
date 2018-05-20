<?php

namespace App\Http\Controllers;


use App\ServiceInterfaces\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller{
    
    private $authService;
    
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    
    public function login(Request $request)
    {
        $data = $request->all();
        return $this->authService->attempt($data);
    }
}