<?php

namespace App\Observers;

use App\Jobs\TelegramMessageJob;
use App\Models\Task;
use App\Service\Telegram\TelegramService;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    private TelegramService $telegramService;

    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        Log::info('Created new Task: ' . $task->id . '. ' . $task->title);

        flash()->info('Task created: ' . $task->title);

        $message = 'Task: ' . $task->title . ' created';
        TelegramMessageJob::dispatch($this->telegramService, $message);
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

        $message = 'Task: ' . $task->title . ' deleted';
        TelegramMessageJob::dispatch($this->telegramService, $message);
    }
}
