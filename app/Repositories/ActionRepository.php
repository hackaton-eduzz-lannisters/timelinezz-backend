<?php

namespace App\Repositories;

use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\Models\Action;

class ActionRepository extends AbstractRepository implements ActionRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Action());
    }
    public function byUser($userId, $records = 10)
    {
        return $this->model->where('user_id', $userId)->paginate($records);
    }
}