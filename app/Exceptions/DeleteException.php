<?php

namespace App\Exceptions;

use App\Messages\Messages;
use Exception;

class DeleteException extends Exception
{
    public function __construct(string $message = Messages::MSG_EXCLUIR, int $code = 400)
    {
        parent::__construct($message, $code);
    }
}
