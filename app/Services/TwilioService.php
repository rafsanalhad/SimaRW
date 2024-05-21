<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $this->from = env('TWILIO_WHATSAPP_FROM');
    }

    public function sendWhatsAppMessage($message)
    {
        $this->client->messages->create(
            "whatsapp:+6285215510682", // Destination WhatsApp number
            [
                'from' => $this->from, // Sender WhatsApp number
                'body' => $message,
            ]
        );
    }
}
