<?php

namespace App\Http\DTO;
use Illuminate\Http\Request;

class CreateTaskDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
        public string $due_date
    ) {}

    public static function makeFormRequest(Request $request){
        return new self(
            $request->title,
            $request->description,
            "pendente",
            $request->due_date
        );
    }
}
