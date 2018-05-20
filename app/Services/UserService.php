<?php

namespace App\Services;

use App\ServiceInterfaces\UserServiceInterface;
use App\RepositoryInterfaces\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    public function findByCredentials($email)
    {
        return $this->userRepository->findByCredentials($email);
    }
}