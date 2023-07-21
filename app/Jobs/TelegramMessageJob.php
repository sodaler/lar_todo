<?php

namespace App\Jobs;

use App\Service\Telegram\TelegramService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TelegramMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected TelegramService $telegramService;
    protected string $message;

    /**
     * Create a new job instance.
     */
    public function __construct(TelegramService $telegramService, string $message)
    {
        $this->telegramService = $telegramService;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->telegramService->sendNotification($this->message);
    }
}
