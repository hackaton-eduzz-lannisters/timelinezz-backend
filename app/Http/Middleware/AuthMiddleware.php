<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Exceptions\AuthException;
use App\ServiceInterfaces\AuthServiceInterface;
use Firebase\JWT\JWT;

class AuthMiddleware
{
    private $authService;
    
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    
    public function handle(Request $request, \Closure $next)
    {
        try {
            $header = $request->header("Authorization");
            if (!$header) {
                throw new AuthException("Token de acesso não informado.", 401);
            }
            
            $clean = trim(str_replace("Bearer ", "", $header));
            $user = JWT::decode($clean, env("APP_SECRET"), ["HS256"]);
            
            $request->attributes->add(["user" => $user]);
            
            return $next($request);
            
        } catch (\Exception $e) {
            throw new AuthException("Houve uma falha na autenticação. Verifique os dados e tente novamente.", 401);
        }
    }
}