<?php

namespace App\AnimeQuotes\Providers\AnimeChan;

use App\AnimeQuotes\Contracts\RandomQuoteInterface;
use App\AnimeQuotes\ServiceResponse;
use GuzzleHttp\Client;

class AnimeChanClient implements RandomQuoteInterface
{
    public function fetch(Client $client)
    {
        $response = $client->get(config('animechan.base_url') . 'random');

        return json_decode($response->getBody());
    }
}
