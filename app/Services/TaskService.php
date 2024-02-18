<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function createTask($data)
    {
        return Task::create($data);
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

        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return $task;
    }
}
