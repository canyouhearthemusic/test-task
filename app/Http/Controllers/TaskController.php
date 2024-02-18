<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = Task::sort(request('sort'))->get();

        return inertia('Tasks/Index', compact('tasks'));
    }

    public function store(TaskFormRequest $request)
    {
        $this->taskService->createTask($request->validated());

        return to_route('task.index')->with(['success', 'Task has been created!']);
    }

    public function edit(int $id)
    {
        $task = Task::firstWhere('id', $id);

        return inertia('Tasks/Edit', compact('task'));
    }

    public function update(TaskFormRequest $request, int $id)
    {
        $this->taskService->updateTask($id, $request->validated());

        return to_route('task.index')->with(['success' => "Task with id {$id} has been updated!"]);
    }

    public function patch(Request $request)
    {
        $this->taskService->toggleStatus($request->id);

        return to_route('task.index')->with(['success' => "Task with id {$request->id} has been updated!"]);
    }

    public function destroy(Request $request)
    {
        $this->taskService->deleteTask($request->id);

        return to_route('task.index')->with(['success' => 'Task has been deleted!']);
    }

}
