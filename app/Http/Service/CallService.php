<?php


namespace App\Http\Service;


use App\Value\TwilioConfiguration;
use Twilio\Rest\Client;

class CallService
{
    /**
     * @var Client
     */
    private $client;
    private $twilioConfig;

    public function __construct(
        Client $client,
        TwilioConfiguration $twilioConfig
    )
    {
        $this->client = $client;
        $this->twilioConfig = $twilioConfig;
    }

    public function call($phone)
    {
        $this->client->account->calls->create(
            $phone,
            $this->twilioConfig->getTwilioNumber(),
            array(
                "url" => $this->twilioConfig->getUrl()
            )
        );
    }
}
