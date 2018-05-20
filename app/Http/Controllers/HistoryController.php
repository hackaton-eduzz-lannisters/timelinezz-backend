<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceInterfaces\HistoryServiceInterface;
use App\Repositories\HistoryRepository;

class HistoryController extends Controller
{
    private $historyService;
    private $historyRepository;
    
    public function __construct(HistoryServiceInterface $historyService, HistoryRepository $historyRepository)
    {
        $this->historyService = $historyService;
        $this->historyRepository = $historyRepository;
    }
    
    private function checkHistoryOwner(Request $request, $appId) {
        $app = $this->historyService->getById($appId);
        
        if (!$app || $app->user_id != @$request->attributes->user->user_id) {
            //throw new \Exception('History not found.');
        }

        return $app;
    }
    
    public function list() {
        return $this->historyRepository->all();
    }
    public function add(Request $request)
    {
        $app = $this->historyService->create($request->all());

        return $app;
    }
    
    public function update(Request $request, $appId)
    {
        $this->checkHistoryOwner($request, $appId);

        return $this->historyService->update($appId, $request->all());
    }
}






















