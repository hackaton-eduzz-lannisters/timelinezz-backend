<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceInterfaces\ActionServiceInterface;
use App\Repositories\ActionRepository;

class ActionController extends Controller
{
    private $actionService;
    private $actionRepository;
    
    public function __construct(ActionServiceInterface $actionService, ActionRepository $actionRepository)
    {
        $this->actionService = $actionService;
        $this->actionRepository = $actionRepository;
    }
    
    private function checkActionOwner(Request $request, $appId) {
        $app = $this->actionService->getById($appId);
        
        if (!$app || $app->user_id != $request->attributes->get('user')->sub) {
            throw new \Exception('Action not found.');
        }

        return $app;
    }
    
    public function list(Request $request) {
        return $this->actionRepository->byUser($request->attributes->get('user')->sub);
    }
    public function add(Request $request)
    {
        $app = $this->actionService->create($request->all());

        return $app;
    }
    
    public function update(Request $request, $appId)
    {
        $this->checkActionOwner($request, $appId);

        return $this->actionService->update($appId, $request->all());
    }
}






















