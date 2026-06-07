<?php
namespace App\Support\Exceptions;
class BusinessRuleException extends AppException
{
    public function __construct(string $message = 'Regla de negocio violada', array $details = [])
    {
        parent::__construct($message, 409, 'BUSINESS_RULE_VIOLATION', $details);
    }
}
