<?php

namespace App\Service\Telegram;

class TelegramHandler
{
    protected int $chatId;
    protected string $token;

    public function __construct()
    {
        $this->chatId = (int) config('services.telegram.chat_id');
        $this->token = config('services.telegram.token');
    }

    public function write(string $text): void
    {
        TelegramBotApi::sendMessage(
            $this->token,
            $this->chatId,
            $text
        );
    }
}
