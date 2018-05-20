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
        
        if (!$app || $app->user_id != @$request->attributes->user->user_id) {
            //throw new \Exception('Action not found.');
        }

        return $app;
    }
    
    public function list() {
        return $this->actionRepository->all();
    }
    public function del(Request $request, $appId)
    {
	    $ret = $this->checkActionOwner($request, $appId);

		$this->actionService->del($appId);
		
        return $ret;
    }
    public function add(Request $request)
    {
	    $data = $request->all();
	    $data['user_id'] = $request->attributes->get('user')->sub;
        $app = $this->actionService->create($data);

        return $app;
    }
    
    public function update(Request $request, $appId)
    {
        $this->checkActionOwner($request, $appId);

        return $this->actionService->update($appId, $request->all());
    }
}






















