<?php

namespace App\Models\Bots;

interface BotInterface
{
    public function sendMessage(string $message): void;
}
