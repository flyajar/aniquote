<?php

namespace App\AnimeQuotes\Contracts;

use GuzzleHttp\Client;

interface RandomQuoteInterface
{
    public function fetch(Client $client);
}
