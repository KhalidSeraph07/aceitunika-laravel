<?php
namespace App\Support\Exceptions;
class NotFoundException extends AppException
{
    public function __construct(string $resource = 'Recurso')
    {
        parent::__construct("{$resource} no encontrado", 404, 'NOT_FOUND');
    }
}
