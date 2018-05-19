<?php

namespace App\Services;

use App\Mappers\Responses\HistoryResponseMapper;
use App\RepositoryInterfaces\HistoryRepositoryInterface;
use App\ServiceInterfaces\TimelineServiceInterface;

class TimelineService implements TimelineServiceInterface
{   
    private $historyRepository;
    
    public function __construct(HistoryRepositoryInterface $userRepository)
    {
        $this->historyRepository = $userRepository;
    }
    
    public function allUsersTimelines($userId)
    {
        $userHistories = $this->historyRepository->retrieveAllUserHistories($userId);
        $mapper = new HistoryResponseMapper();
        return $mapper->transform($userHistories);
    }
}