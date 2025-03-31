<?php

namespace App\Http\DTO;

use App\Http\Enums\TasksStatus;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class UpdateTaskDTO
{
    public function __construct(
        public string $id,
        public  string $title,
        public string|null $description,
        public string $status,
        public string|null $due_date
    ) {}

    public static function makeFormRequest(TaskRequest $request, string $id = null)
    {
        return new self(
            $id ?? $request->id,
            $request->title,
            $request->description,
            $request->status,
            $request->due_date
        );
    }
}
