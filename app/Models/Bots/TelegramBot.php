<?php

namespace App\Models\Bots;

class TelegramBot implements BotInterface
{
    public function sendMessage(string $message): void
    {
//        $curl = curl_init('https://api.telegram.org/bot' . $this->getToken() . '/sendMessage?chat_id=' . $this->getChatId() .'&text=' . $message);
//        curl_exec($curl);
//        curl_close($curl);
    }

    protected function getToken(): string {
        return env('TELEGRAM_TOKEN');
    }

    protected function getChatId(): string {
        return env('TELEGRAM_CHAT_ID');
    }
}
