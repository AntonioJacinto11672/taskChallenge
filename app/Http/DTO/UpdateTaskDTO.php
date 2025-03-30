<?php
namespace App\Http\DTO;

use Illuminate\Http\Request;

class UpdateTaskDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $due_date
    ) {}

    public static function makeFormRequest(Request $request){
        return new self(
            $request->id,
            $request->title,
            $request->description,
            $request->due_date
        );
    }
}
