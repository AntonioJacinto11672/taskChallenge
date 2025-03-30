<?php

namespace App\Http\repositories;

use App\Http\DTO\CreateTaskDTO;
use App\Http\DTO\UpdateTaskDTO;
use App\Http\Repositories\PaginationInterface;
use App\Http\Repositories\PaginationPresenter;
use App\Models\Task;
use stdClass;

class TaskEloquentORM  implements TaskRepositiryInterface
{

    public function __construct(protected Task $model) {}
    function paginate(int $page = 1, int $totalPage = 15, string $filter = null): PaginationInterface
    {
        $res =  $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('title', $filter);
                    $query->orWhere('description', 'like', "%{$filter}%");
                    $query->orWhere('status', 'like', "%{$filter}%");
                    $query->orWhere('due_date', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPage, ['*'], 'page', $page);

        //dd((new PaginationPresenter($res))->items());
        return new PaginationPresenter($res);
    }
    public function getAll(string $filter = null): array
    {

        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('title', $filter);
                    $query->orWhere('description', 'like', "%{$filter}%");
                    $query->orWhere('status', 'like', "%{$filter}%");
                    $query->orWhere('due_date', 'like', "%{$filter}%");
                }
            })
            ->get()->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $task = $this->model->find($id);
        if (!$task) {
            return null;
        }
        return (object) $task->toArray();
    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
    public function new(CreateTaskDTO $dto): stdClass
    {
        $task =  $this->model->create((array) $dto);
        return (object) $task->toArray();
    }
    public function update(UpdateTaskDTO $dto): stdClass|null
    {
        if ($task = $this->model->find($dto->id)) {
            # code...
        }
        $task->update((array) $dto);

        return (object) $task->toArray();
    }
}
