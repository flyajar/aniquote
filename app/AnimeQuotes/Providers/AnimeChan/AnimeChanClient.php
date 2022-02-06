<?php

namespace App\AnimeQuotes\Providers\AnimeChan;

use App\AnimeQuotes\Contracts\RandomQuoteInterface;
use App\AnimeQuotes\ServiceResponse;
use GuzzleHttp\Client;

class AnimeChanClient implements RandomQuoteInterface
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetch()
    {
        $response = $this->client->get('random');

        return json_decode($response->getBody());
    }
}
