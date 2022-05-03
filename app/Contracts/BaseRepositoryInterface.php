<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function create($entity);

    public function all(int $pageSize);

    public function findById($id);

    public function update($id, $entity): bool|null;

    public function delete($id): int;
}
