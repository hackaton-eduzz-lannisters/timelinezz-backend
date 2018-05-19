<?php

namespace App\Repositories;

use App\RepositoryInterfaces\ActionRepositoryInterface;
use App\Model\Action;

class ActionRepository extends AbstractRepository implements ActionRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Action());
    }
}