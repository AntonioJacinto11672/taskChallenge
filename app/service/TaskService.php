<?php

namespace App\service;

use App\Http\DTO\CreateTaskDTO;
use App\Http\DTO\UpdateTaskDTO;
use App\Http\Repositories\PaginationInterface;
use App\Http\repositories\TaskRepositiryInterface;
use stdClass;

class TaskService
{
    public function __construct(protected TaskRepositiryInterface $repository) {}

    public function paginate(
        int $page = 1,
        int $totalPage = 15,
        string $filter = null
    ): PaginationInterface {    
        return $this->repository->paginate(page: $page, totalPage: $totalPage, filter: $filter);
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll();
    }
    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(
        CreateTaskDTO $dto
    ): stdClass {

        return $this->repository->new($dto);
    }

    public function update(
        UpdateTaskDTO $dto
    ): stdClass|null {

        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
