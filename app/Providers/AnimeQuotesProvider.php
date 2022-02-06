<?php

namespace App\Providers;

use App\AnimeQuotes\AnimeQuotesClient;
use App\AnimeQuotes\ProviderSelector;
use Illuminate\Support\ServiceProvider;

class AnimeQuotesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('anime-quotes', function ($app) {
            return new AnimeQuotesClient();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
