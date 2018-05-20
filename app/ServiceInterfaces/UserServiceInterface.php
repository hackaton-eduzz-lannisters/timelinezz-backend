<?php

namespace App\ServiceInterfaces;

interface UserServiceInterface
{
    function create($data);
    
    function findByCredentials($email);
}