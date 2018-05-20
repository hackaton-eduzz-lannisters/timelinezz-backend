<?php

namespace App\Services;

use App\ServiceInterfaces\AuthServiceInterface;
use App\ServiceInterfaces\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use App\Exceptions\AuthException;
use App\Exceptions\ServerException;

class AuthService implements AuthServiceInterface
{
    private $userService;
    
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    
    public function attempt($data)
    {
        $email = $data["email"];
        $user = $this->userService->findByCredentials($email);
        if (is_null($user)) {
            throw new AuthException("Usuário não encontrado", 404);           
        }
        $valid = Hash::check($data["password"], $user->password);
        if (!$valid) {
            throw new AuthException("Houve um erro na autenticação. Verifique seus dados e tente novamente.", 401);
        }

        $payload = [
            "iss" => "timelinezz",
            "sub" => $user->id,
            "iat" => time(),
            "exp" => time() + 60*60
        ];
        
        return ["token" => JWT::encode($payload, env("APP_SECRET"), "HS256")];
    }
    
    public function createAccount($data)
    {
        try {
            $data["password"] = Hash::make($data["password"]);
            return $this->userService->create($data);
        } catch (\Exception $e) {
            throw new ServerException("Houve um erro na criação do usuário.", 500);
        }
    }
}