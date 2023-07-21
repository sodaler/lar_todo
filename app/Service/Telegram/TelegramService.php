<?php

namespace App\Service\Telegram;

class TelegramService
{
    private TelegramHandler $telegramHandler;

    public function __construct(TelegramHandler $telegramHandler)
    {
        $this->telegramHandler = $telegramHandler;
    }

    public function sendNotification($message)
    {
        $this->telegramHandler->write($message);
    }
}
