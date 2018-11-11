<?php

namespace MortenScheel\SpamProtect\Exceptions;

use Exception;
use Throwable;

class SpamException extends Exception
{
    public function __construct(\Swift_Message $mail, string $recipient)
    {
        $message = 'Spam protection prevented email delivery. Subject: ' . $mail->getSubject() . ' To: ' . $recipient;
        parent::__construct($message);
    }
}
