<?php

namespace MortenScheel\SpamProtect\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MortenScheel\SpamProtect\Exceptions\SpamException;
use MortenScheel\SpamProtect\SentMail;

class OnMessageSending
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSending $event
     * @return void
     * @throws SpamException
     */
    public function handle(MessageSending $event)
    {
        $message = $event->message;
        $to = $message->getTo();
        $body_hash = sha1($message->getBody());
        foreach ($to as $address => $name) {
            if (SentMail::query()->where('body_hash', $body_hash)->where('address_hash', sha1($address))->exists()){
                throw new SpamException($message, $address);
            }
        }
    }
}
