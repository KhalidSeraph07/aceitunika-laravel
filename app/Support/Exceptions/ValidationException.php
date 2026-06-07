<?php
namespace App\Support\Exceptions;
class ValidationException extends AppException
{
    public function __construct(string $message = 'Datos inválidos', array $details = [])
    {
        parent::__construct($message, 422, 'VALIDATION_ERROR', $details);
    }
}
