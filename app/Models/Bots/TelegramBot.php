<?php

namespace App\Models\Bots;

use Illuminate\Support\Facades\Http;

class TelegramBot implements BotInterface
{
    public function sendMessage(string $message): void
    {
        Http::get('https://api.telegram.org/bot' . $this->getToken() . '/sendMessage?chat_id=' . $this->getChatId() .'&text=' . $message);
    }

    protected function getToken(): string {
        return env('TELEGRAM_TOKEN');
    }

    protected function getChatId(): string {
        return env('TELEGRAM_CHAT_ID');
    }
}
