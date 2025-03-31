<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identify' => $this->id,
            'title' => strtoupper($this->title),
            'description' => $this->description,
            'status' => $this->status,
            'create_at' => Carbon::make($this->created_at)->format('Y-d-m H:i:s')
        ];
    }
}
