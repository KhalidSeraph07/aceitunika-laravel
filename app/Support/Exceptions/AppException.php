<?php

namespace App\Support\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppException extends Exception
{
    public function __construct(
        string $message = '',
        protected int $statusCode = 500,
        protected string $errorCode = 'INTERNAL_ERROR',
        protected array $details = [],
    ) {
        parent::__construct($message);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function render(Request $request): JsonResponse
    {
        $requestId = $request->header('X-Request-Id', (string) \Illuminate\Support\Str::uuid());

        return response()->json([
            'error' => true,
            'code' => $this->getErrorCode(),
            'message' => $this->getMessage(),
            'details' => $this->getDetails(),
            'request_id' => $requestId,
        ], $this->getStatusCode());
    }
}
