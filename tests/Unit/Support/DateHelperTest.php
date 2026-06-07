<?php

use App\Support\DateHelper;
use Carbon\Carbon;

it('formats UTC date to America/Lima timezone for display', function () {
    $utc = Carbon::createFromFormat('Y-m-d H:i:s', '2026-06-06 12:00:00', 'UTC');
    config(['app.display_timezone' => 'America/Lima']);

    $display = DateHelper::toDisplay($utc);

    expect($display)->toBe('2026-06-06 07:00:00');
});

it('returns null for null input', function () {
    expect(DateHelper::toDisplay(null))->toBeNull();
});

it('converts Lima input to UTC for storage', function () {
    config(['app.display_timezone' => 'America/Lima']);

    $utc = DateHelper::toStorage('2026-06-06 07:00:00');

    expect($utc->timezoneName)->toBe('UTC')
        ->and($utc->format('Y-m-d H:i:s'))->toBe('2026-06-06 12:00:00');
});

it('now() returns Carbon in UTC', function () {
    $now = DateHelper::now();

    expect($now->timezoneName)->toBe('UTC');
});
