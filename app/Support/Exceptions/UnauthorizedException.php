<?php
namespace App\Support\Exceptions;
class UnauthorizedException extends AppException
{
    public function __construct(string $message = 'No autorizado')
    {
        parent::__construct($message, 403, 'UNAUTHORIZED');
    }
}
