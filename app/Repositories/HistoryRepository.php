<?php

namespace App\Repositories;

use App\Models\History;
use App\RepositoryInterfaces\HistoryRepositoryInterface;

class HistoryRepository extends AbstractRepository implements HistoryRepositoryInterface
{
    public function __construct() 
    {
        parent::__construct(new History());
    }
    
    public function retrieveAllUserHistories($userId)
    {
        return $this->model
                    ->with(["action"])
                    ->with(["product"])
                    ->with(["link"])
                    ->with(["follows" => function ($query) {
                        $query->with(["following"]);
                    }])
                    ->whereHas("follows", function ($query) use ($userId) {
                        $query->where("user_id", $userId);
                    })
                    ->paginate(10);
    }
    
    public function retrieveUserHistories($userId, $followId)
    {
        return $this->model
                    ->with(["action"])
                    ->with(["product"])
                    ->with(["link"])
                    ->with(["follows" => function ($query) {
                        $query->with(["following"]);
                    }])
                    ->whereHas("follows", function ($query) use ($userId, $followId) {
                        $query->where("user_id", $userId)
                              ->where("following_id", $followId);
                    })
                    ->paginate(10);
    }
}