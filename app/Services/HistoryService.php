<?php

namespace App\Services;

use App\Mappers\Responses\HistoryResponseMapper;
use App\RepositoryInterfaces\HistoryRepositoryInterface;
use App\ServiceInterfaces\HistoryServiceInterface;
use App\ServiceInterfaces\LinkServiceInterface;

class HistoryService implements HistoryServiceInterface
{   
    private $historyRepository;
    private $linkService;
    
    public function __construct(HistoryRepositoryInterface $repository, LinkServiceInterface $link)
    {
        $this->historyRepository = $repository;
        $this->linkService = $link;
    }

    public function create($data)
    {
        $data['sponsored'] = $data['sponsored'] ? 1 : 0;

        if (isset($data['url'])) {
            $url = $data['url'];

            $link = $this->linkService->getByUrl($url);
            
            if ($link)
                $data['link_id'] = $link['id'];

            $data['url'] = null;
            unset($data['url']);
            unset($data[array_search('url', $data)]);
        }
        return $this->historyRepository->create($data);
    }

    public function update($appId, $data)
    {
        return $this->historyRepository->update($appId, $data);
    }

    public function getById($appId) {
        return $this->historyRepository->find($appId);
    }
}