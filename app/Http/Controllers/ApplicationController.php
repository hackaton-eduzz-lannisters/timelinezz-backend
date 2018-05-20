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
    
    public function add(Request $request)
    {
        $app = $this->applicationService->create($request->all());

        return $app;
    }
}