<?php

namespace App\Exceptions;

use App\Messages\Messages;
use Exception;

class SaveException extends Exception
{
    public function __construct(string $message = Messages::MSG_SAVE, int $code = 500)
    {
        parent::__construct($message, $code);
    }
}
