<?php

namespace App\Helpers;

class StringHelper
{
    public static function getStringOrNull(?string $string): ?string
    {
        return empty($string) ? null : $string;
    }
}
