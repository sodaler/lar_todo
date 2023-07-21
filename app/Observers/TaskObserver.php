<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        Log::info('Created new Task: ' . $task->id . '. ' . $task->title);

        flash()->info('Task created: ' . $task->title);
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        Log::info('Updated Task: ' . $task->id . '. ' . $task->title);

        flash()->info('Task updated: ' . $task->title);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        Log::info('Deleted Task: ' . $task->id . '. ' . $task->title);

        flash()->alert('Task deleted: ' . $task->title);
    }
}
