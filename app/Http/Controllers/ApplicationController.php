<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceInterfaces\ApplicationServiceInterface;
use App\Repositories\ApplicationRepository;

class ApplicationController extends Controller
{
    private $applicationService;
    private $appRepository;
    
    public function __construct(ApplicationServiceInterface $applicationService, ApplicationRepository $appRepository)
    {
        $this->applicationService = $applicationService;
        $this->appRepository = $appRepository;
    }
    
    private function checkAppOwner($appId, Request $request) {
        $app = $this->applicationService->getById($appId);
        
        if (!$app || $app['user_id'] != $request->attributes['user']->user_id) {
            throw new Exception('Application not found.');
        }

        return $app;
    }
    
    public function add(Request $request)
    {
        $app = $this->applicationService->create($request->all());

        return $app;
    }
    
    public function generateKey($appId, Request $request) {
        $this->checkAppOwner($appId, $request);
        
        return $this->applicationService->updateToken($appId);
    }
    
    public function update($appId, Request $request)
    {
        $this->checkAppOwner($appId, $request);

        return $this->applicationService->update($appId, $request->all());
    }
}