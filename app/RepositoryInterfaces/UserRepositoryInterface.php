<?php 

namespace App\RepositoryInterfaces;

interface UserRepositoryInterface
{
    function retrieveAllUserHistories($userId);
}