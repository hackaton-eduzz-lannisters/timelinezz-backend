<?php

namespace App\Services;

use App\Mappers\Responses\HistoryResponseMapper;
use App\RepositoryInterfaces\HistoryRepositoryInterface;
use App\ServiceInterfaces\TimelineServiceInterface;

class TimelineService implements TimelineServiceInterface
{   
    private $historyRepository;
    private $mapper;
    
    public function __construct(HistoryRepositoryInterface $userRepository, HistoryResponseMapper $mapper)
    {
        $this->historyRepository = $userRepository;
        $this->mapper = $mapper;
    }
    
    public function allUsersTimelines($userId)
    {
        $userHistories = $this->historyRepository->retrieveAllUserHistories($userId);
        return $this->mapper->transform($userHistories);
    }
    
    public function userTimeline($userId, $followId)
    {
        $userHistories = $this->historyRepository->retrieveAllUserHistories($userId);
        return $this->mapper->transform($userHistories);
    }
}