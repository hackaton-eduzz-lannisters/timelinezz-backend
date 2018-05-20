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
    public function list(Request $request) {
        return $this->appRepository->byUser($request->attributes->get('user')->sub);
    }
    private function checkAppOwner(Request $request, $appId) {
        $app = $this->applicationService->getById($appId);
        
        if (!$app || $app->user_id != $request->attributes->get('user')->sub) {
            throw new \Exception('Application not found.');
        }

        return $app;
    }
    
    public function add(Request $request)
    {
	    $data = $request->all();
	    $data['user_id'] = $request->attributes->get('user')->sub;

        $app = $this->applicationService->create($data);

        return $app;
    }
    
    public function del(Request $request, $appId)
    {
	    $ret = $this->checkAppOwner($request, $appId);

		$this->applicationService->del($appId);
		
        return $ret;
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






















