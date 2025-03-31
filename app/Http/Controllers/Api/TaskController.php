<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\CreateTaskDTO;
use App\Http\Requests\TaskRequest;
use App\service\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct(protected TaskService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = $this->service->new(CreateTaskDTO::makeFormRequest($request));
        
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
