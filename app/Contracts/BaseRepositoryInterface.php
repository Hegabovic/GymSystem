<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function create($entity);

    public function all();

    public function allWithTrashed();

    public function findById($id);

    public function update($id, $entity): bool|null;

    public function delete($id): int;
}
