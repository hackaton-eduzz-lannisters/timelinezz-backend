<?php

namespace App\Repositories;

use App\Model\User;
use App\RepositoryInterfaces\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new User());
    }
    
    public function retrieveAllUserHistories($userId)
    {
        
    }
}