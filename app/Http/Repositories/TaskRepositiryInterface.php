<?php

namespace App\Http\Repositories;

use App\Http\DTO\CreateTaskDTO;
use App\Http\DTO\UpdateTaskDTO;
use stdClass;

interface TaskRepositiryInterface
{
    public function paginate(int $page = 1, int $totalPage= 15,string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateTaskDTO $dto): stdClass;
    public function update(UpdateTaskDTO $dto): stdClass|null;
}
