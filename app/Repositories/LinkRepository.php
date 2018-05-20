<?php

namespace App\Repositories;

use App\Model\Link;
use App\RepositoryInterfaces\LinkRepositoryInterface;

class LinkRepository extends AbstractRepository implements LinkRepositoryInterface
{
    public function __construct() 
    {
        parent::__construct(new Link());
    }
    
    public function getByUrl($url)
    {
        return $this->model->where('url', $url)->first();
    }
}