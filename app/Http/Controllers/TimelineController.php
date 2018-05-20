<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceInterfaces\TimelineServiceInterface;

class TimelineController extends Controller
{
    private $timelineService;
    
    public function __construct(TimelineServiceInterface $timelineService)
    {
        $this->timelineService = $timelineService;
    }
    
    public function allUsers(Request $request)
    {
        $userId = 1;
        
        $timelines = $this->timelineService->allUsersTimelines($userId);
        return response()->json($timelines, 200);
    }
    
    public function specificUser(Request $request, int $followId)
    {
        $userId = 2;
        
        $timelines = $this->timelineService->userTimeline($userId, $followId);
        return response()->json($timelines, 200);
    }
}