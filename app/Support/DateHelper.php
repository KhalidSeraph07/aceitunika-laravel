<?php

namespace App\Support;

use Carbon\Carbon;

class DateHelper
{
    public static function toDisplay(?Carbon $date, string $format = 'Y-m-d H:i:s'): ?string
    {
        if ($date === null) {
            return null;
        }

        return $date->copy()->setTimezone(config('app.display_timezone'))->format($format);
    }

    public static function toStorage(string $date): Carbon
    {
        return Carbon::parse($date, config('app.display_timezone'))
            ->setTimezone('UTC');
    }

    public static function now(): Carbon
    {
        return Carbon::now('UTC');
    }
}
