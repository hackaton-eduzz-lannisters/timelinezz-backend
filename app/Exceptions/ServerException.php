<?php

namespace App\Exceptions;

class ServerException extends \DomainException implements \JsonSerializable
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

    public function jsonSerialize()
    {
        return [
            "message" => $this->message
        ];
    }
}