<?php

namespace App\Repositories;

use App\RepositoryInterfaces\ApplicationRepositoryInterface;
use App\Models\Group as Application;

class ApplicationRepository extends AbstractRepository implements ApplicationRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Application());
    }
    public function byUser($userId, $records = 10)
    {
        return $this->model->where('user_id', $userId)->paginate($records);
    }
}