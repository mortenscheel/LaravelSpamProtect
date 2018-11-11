<?php

namespace MortenScheel\SpamProtect\Listeners;

use MortenScheel\SpamProtect\SentMail;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnMessageSent
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $message = $event->message;
        $recipients = $message->getTo();
        $body_hash = sha1($message->getBody());
        foreach ($recipients as $address => $name) {
            $address_hash = sha1($address);
            SentMail::create(compact('body_hash', 'address_hash'));
        }
    }
}
