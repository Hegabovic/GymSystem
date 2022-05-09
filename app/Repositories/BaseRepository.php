<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{

    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($entity)
    {
        return $this->model->create($entity);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allWithTrashed()
    {
        return $this->model->withTrashed()->get();
    }

    public function update($id, $entity): bool|null
    {
        return $this->findById($id)->update($entity);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function delete($id): int
    {
        $selectedModel = $this->findById($id);
        if ($selectedModel == null)
            return 0;
        return $selectedModel->delete();
    }

    public function select($columns)
    {
        return $this->model->select($columns)->get();
    }
}
