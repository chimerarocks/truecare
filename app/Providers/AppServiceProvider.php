<?php

namespace App\Providers;

use App\Value\TwilioConfiguration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Client::class,
            function () {
                $accountId = env('TWILIO_ACCOUNT_SID');
                $authToken = env('TWILIO_AUTH_TOKEN');
                return new Client($accountId, $authToken);
            }
        );

        $twilioNumber = env('TWILIO_NUMBER');
        $this->app->when(TwilioConfiguration::class)
            ->needs('$twilioNumber')
            ->give($twilioNumber);

        $twilioUrl = env('TWILIO_XML_URL');
        $this->app->when(TwilioConfiguration::class)
            ->needs('$url')
            ->give($twilioUrl);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
