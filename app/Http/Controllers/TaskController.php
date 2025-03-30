<?php

namespace App\Http\Controllers;

use App\Http\DTO\CreateTaskDTO;
use App\Http\DTO\UpdateTaskDTO;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\service\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(protected TaskService $service) {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = $this->service->paginate(
            page: $request->get('page', 1),
            totalPage: $request->get('per_page', 2),
            filter: $request->filter
        );
       
        $filters = ['filter' => $request->get('filter', '')];
        //dd($tasks);
        return view('task.index', compact('tasks', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        //
        /* $data = $request->all();
        $data['status'] = 'pendente'; */

       /*  $data = $request->validate([
            'title' => 'required|unique:tasks|min:3|max:255'
        ]); */

        
      /*   $data['status'] = 'pendente';
        Task::create($data);

       ; */

       

        $this->service->new(CreateTaskDTO::makeFormRequest($request));
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    

        /*   if (!$task = Task::find($id)) {
            return redirect()->back();
        } */

        
        if (!$task = $this->service->findOne($id)) {
            return back();
        }

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $task = $this->service->update(UpdateTaskDTO::makeFormRequest($request));

        if (!$task) {
            return redirect()->back();
        }

        //
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

      $this->service->delete($id);
      return redirect()->route('task.index');
    }

      /**
     * Display the specified resource.
     */
    public function updateStatusView(string $id)
    {
     return view('task.updateStatus');  
    }
}
