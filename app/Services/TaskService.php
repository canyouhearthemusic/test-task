<?php

namespace App\Services;

use App\Events\TaskDoneEvent;
use App\Models\Task;

class TaskService
{
    protected GoogleSheetsService $sheetsService;

    public function __construct(GoogleSheetsService $sheetsService)
    {
        $this->sheetsService = $sheetsService;
    }


    public function createTask($data)
    {
        $task = Task::create($data);
    }

    public function updateTask($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);

        return $task;
    }

    public function toggleStatus($id)
    {
        $task = Task::findOrFail($id);
        $task->done_at = $task->done_at ? null : now();
        $task->save();

        TaskDoneEvent::dispatch($task);

        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return $task;
    }
}
