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
        $result = $this->authService->attempt($data);
        return response()->json($result, 200);
    }
    
    public function create(Request $request)
    {
        $result = $this->authService->createAccount($request->all());
        return response()->json($result, 201);
    }
}