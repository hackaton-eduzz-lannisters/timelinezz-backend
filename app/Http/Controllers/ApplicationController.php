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
    public function list() {
        return $this->appRepository->all();
    }
    private function checkAppOwner(Request $request, $appId) {
        $app = $this->applicationService->getById($appId);
        
        if (!$app || $app->user_id != @$request->attributes->user->user_id) {
            //throw new \Exception('Application not found.');
        }

        return $app;
    }
    
    public function add(Request $request)
    {
        $app = $this->applicationService->create($request->all());

        return $app;
    }
    
    public function generateKey(Request $request, $appId) {
        $this->checkAppOwner($request, $appId);
        
        return $this->applicationService->updateToken($appId);
    }
    
    public function update(Request $request, $appId)
    {
        $this->checkAppOwner($request, $appId);

        return $this->applicationService->update($appId, $request->all());
    }
}






















