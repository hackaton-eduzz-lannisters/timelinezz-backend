<?php 

namespace App\RepositoryInterfaces;

interface UserRepositoryInterface
{
    function findByCredentials($email);
}