<?php


namespace App\Value;


class TwilioConfiguration
{
    /**
     * @var string
     */
    private $twilioNumber;
    /**
     * @var string
     */
    private $url;

    /**
     * TwilioConfiguration constructor.
     * @param string $twilioNumber
     * @param string $url
     */
    public function __construct(
        string $twilioNumber,
        string $url
    )
    {
        $this->twilioNumber = $twilioNumber;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTwilioNumber(): string
    {
        return $this->twilioNumber;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
