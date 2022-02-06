<?php

namespace App\AnimeQuotes\Facades;

use Illuminate\Support\Facades\Facade;

class AnimeQuotesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'anime-quotes';
    }
}
