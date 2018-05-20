<?php

namespace App\ServiceInterfaces;

interface AuthServiceInterface
{
    function attempt($data);
    
    function createAccount($data);
}