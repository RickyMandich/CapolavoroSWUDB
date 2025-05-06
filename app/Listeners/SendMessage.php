<?php

namespace App\Listeners;

use App\Events\MessageCreated;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessage implements ShouldQueue{

    /**
     * Handle the event.
     */
    public function handle(MessageCreated $event): void{
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        
        try {
            Http::withoutVerifying()->get("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $event->message
            ]);
            echo "Messaggio inviato:\t$event->message\n";
            
            return;
        } catch (\Exception $e) {
            \Log::error("Errore Telegram: " . $e->getMessage());
            return;
        }
    }
}
