<?php

namespace App\AnimeQuotes;

use App\AnimeQuotes\Providers\AnimeChan\AnimeChanClient;

class ProviderSelector
{
    public function determineProvider()
    {
        return match (config('aniquote.provider')) {
            "animechan" => new AnimeChanClient(),
            default => new \Exception('Provider not found'),
        };
    }
}
