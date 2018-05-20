<?php

namespace App\Services;

use App\Mappers\Responses\HistoryResponseMapper;
use App\RepositoryInterfaces\ApplicationRepositoryInterface;
use App\ServiceInterfaces\ApplicationServiceInterface;

class ApplicationService implements ApplicationServiceInterface
{   
    private $appRepository;
    
    public function __construct(ApplicationRepositoryInterface $repository)
    {
        $this->appRepository = $repository;
    }
    
    public function create($data)
    {
        $data['token'] = $this->generateKey();
        return $this->appRepository->create($data);
    }
    
    public function update($appId, $data)
    {
        return $this->appRepository->update($appId, $data);
    }

    public function generateKey() {
        return uniqid();
    }
    public function getById($appId) {
        return $this->appRepository->find($appId);
    }
    public function updateToken($appId) {
        $data = [
            'token' => $this->generateKey()
        ];
        
        $this->update($appId, $data);
    }
}