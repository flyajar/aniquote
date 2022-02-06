<?php

namespace App\AnimeQuotes;

use App\AnimeQuotes\Contracts\RandomQuoteInterface;

class AnimeQuotesClient
{
    protected RandomQuoteInterface $provider;

    public function __construct()
    {
        $this->provider = (new ProviderSelector())->determineProvider();
    }

    public function randomQuote()
    {
        return $this->provider->fetch();
    }
}
