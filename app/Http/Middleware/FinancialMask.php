<?php

namespace App\Http\Middleware;

use App\Support\FinancialMask as FinancialMaskService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinancialMask
{
    public function __construct(protected FinancialMaskService $mask) {}

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->is('admin/*')) {
            return $response;
        }

        if (!method_exists($response, 'getData')) {
            return $response;
        }

        $data = $response->getData(true);
        if (!is_array($data)) {
            return $response;
        }

        $masked = $this->mask->apply($data, $request->user());

        return response()->json($masked, $response->getStatusCode(), $response->headers->all());
    }
}
