<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\DTO\CreateTaskDTO;
use App\Http\DTO\UpdateTaskDTO;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\service\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    public function __construct(protected TaskService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$task = Task::paginate();

        $task = $this->service->paginate(
            page: $request->get('page', 1),
            totalPage: $request->get('per_page', 1),
            filter: $request->filter
        );

        //dd($task->items());
        return TaskResource::collection($task->items())
            ->additional([
                'meta' => [
                    'total' => $task->total(),
                    'is_first_page' => $task->isFirstPage(),
                    'is_last_page' => $task->isLastPage(),
                    'current_page' => $task->currentPage(),
                    'next_page' => $task->getNumberNextPage(),
                    'previous_page' => $task->getNumberPreviousPage(),
                ]
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = $this->service->new(CreateTaskDTO::makeFormRequest($request));

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$task = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }
        $task = $this->service->update(UpdateTaskDTO::makeFormRequest($request, $id));




        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);
        return  response()->json([], Response::HTTP_NO_CONTENT);
    }
}
