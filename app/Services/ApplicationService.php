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
        return $this->appRepository->create($data);
    }
}