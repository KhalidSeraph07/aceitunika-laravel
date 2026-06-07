<?php
namespace App\Support\Exceptions;
class ConcurrencyException extends AppException
{
    public function __construct(string $message = 'Conflicto de concurrencia')
    {
        parent::__construct($message, 409, 'CONCURRENCY_CONFLICT');
    }
}
