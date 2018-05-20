<?php

namespace App\Services;

use App\Mappers\Responses\HistoryResponseMapper;
use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\ServiceInterfaces\ActionServiceInterface;

class ActionService implements ActionServiceInterface
{   
    private $actionRepository;
    
    public function __construct(ActionRepositoryInterface $repository)
    {
        $this->actionRepository = $repository;
    }
    
    public function create($data)
    {
        return $this->actionRepository->create($data);
    }
    
    public function update($appId, $data)
    {
        return $this->actionRepository->update($appId, $data);
    }

    public function getById($appId) {
        return $this->actionRepository->find($appId);
    }
}