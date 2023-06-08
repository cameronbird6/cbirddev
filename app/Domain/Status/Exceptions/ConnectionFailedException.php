<?php

namespace App\Domain\Status\Exceptions;

use Exception;
use Throwable;

class ConnectionFailedException extends Exception
{
    public function __construct($service, string $connection = null, int $code = 0, ?Throwable $previous = null)
    {
        $message = "Failed to connect to $service".$connection ? " on connection $connection" : '';
        parent::__construct($message, $code, $previous);
    }

}
