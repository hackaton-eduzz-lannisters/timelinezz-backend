<?php

namespace App\Repositories;

use App\Models\User;
use App\RepositoryInterfaces\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new User());
    }
    
    public function findByCredentials($email)
    {
        return $this->model->where(["email" => $email])->first();
    }
}