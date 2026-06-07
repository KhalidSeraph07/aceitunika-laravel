@php
    $shouldMask = !auth()->user()?->hasRole('admin') && \App\Support\FinancialMask::isFinancialFieldStatic($field);
    $displayValue = $shouldMask ? '***' : $value;
@endphp
<span {{ $attributes->merge(['class' => 'inline-block']) }}>{{ $displayValue }}</span>
