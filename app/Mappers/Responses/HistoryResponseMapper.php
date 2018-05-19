<?php

namespace App\Mappers\Responses;

use League\Fractal;
use App\Model\History;

class HistoryResponseMapper
{
    public function transform($histories)
    {
        $resource = new Fractal\Resource\Collection($histories, function(History $history) {
            return [
                "id_a" => $history->id
            ];
        });
        
        return $resource;
    }
}