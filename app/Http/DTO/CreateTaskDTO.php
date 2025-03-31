<?php

namespace App\Http\DTO;

use App\Http\Requests\TaskRequest;

class CreateTaskDTO
{
    public function __construct(
        public string $title,
        public string|null $description,
        public string $status,
        public string|null $due_date
    ) {}

    public static function makeFormRequest(TaskRequest $request){
        return new self(
            $request->title,
            $request->description,
            'p',
            $request->due_date
        );
    }
}
