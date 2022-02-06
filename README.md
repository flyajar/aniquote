# Aniquote
_Random anime line generator_

### How to setup
    git clone
    composer install
    yarn install
    php artisan key:generate
    php artisan serve


### Usage of strategy design pattern
By default, this project uses [anime-chan](https://animechan.vercel.app/) as its provider.
Adding more providers only requires minimal code change.

### Adding another provider
In the `AnimeQuotes` directory, under the providers. Add your own provider.

     AnimeQuotes
        Contracts
          RandomQuoteInterface.php
        Facades
        Providers
          AnimeChan
             AnimeChanClient.php
          SampleProvider
             SampleProvider.php
        AnimeQuotesClient.php
        ProviderSelector.php

In the example above, we added another provider and named it `SampleProvider`.
Inside the `SampleProvider.php` make sure to implement the `RandomQuoteInterface.php`.

    Class SampleProvider implements RandomQuoteInterface
    {
        public function fetch () 
        {
           //Do your logic here
        }
    }


Lastly, add the `SampleProvider.php` in the `ProviderSelector.php`.

    Class ProviderSelector
    {
        public function determineProvider()
        {
            return match (config('aniquote.provider')) {
                "animechan" => new AnimeChanClient(
                    new Client(['base_uri' => config('animechan.base_url')])
                ),
                "sampleprovider" => new SampleProvider(),
                default => new \Exception('Provider not found'),
            };
        }
    }

The code above will select the corresponding provider based on what the value of `ANIQUOTE_PROVIDER` is your .env


### How to use
    App\AnimeQuotes\Facades\AnimeQuotesFacade::randomQuote();
