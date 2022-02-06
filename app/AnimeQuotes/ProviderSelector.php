<?php

namespace App\AnimeQuotes;

use App\AnimeQuotes\Providers\AnimeChan\AnimeChanClient;
use GuzzleHttp\Client;

class ProviderSelector
{
    public function determineProvider()
    {
        return match (config('aniquote.provider')) {
            "animechan" => new AnimeChanClient(
                new Client(['base_uri' => config('animechan.base_url')])
            ),
            default => new \Exception('Provider not found'),
        };
    }
}
