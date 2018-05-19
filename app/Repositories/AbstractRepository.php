<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    
    public function update($id, array $data)
    {
        return $this->model->update($id, $data);
    }
    
    public function all($records = 10)
    {
        return $this->model->paginate($records);
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }
    
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}